<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\BlockedDate;
use App\Models\WorkDay;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateAppointment extends Component
{
    public $appointment_type_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $country_key = '+962';
    public $appointment_date;
    public $start_time;
    public $end_time;
    public $notes;
    public $status = 'pending';

    public $availableSlots = [];
    public $noSlotsMessage = null;

    protected $rules = [
        'appointment_type_id' => 'required|exists:appointment_types,id',
        'first_name' => 'required|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'country_key' => 'nullable|string|max:10',
        'appointment_date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
        'notes' => 'nullable|string',
        'status' => 'required|in:pending,confirmed,attended,not_attended,cancelled',
    ];

    protected $messages = [
        'appointment_type_id.required' => 'Appointment Type is Required',
        'appointment_type_id.exists' => 'Selected Appointment Type does not exist',

        'first_name.required' => 'First Name is Required',
        'first_name.string' => 'First Name must be a string',
        'first_name.max' => 'First Name must not exceed 255 characters',

        'last_name.string' => 'Last Name must be a string',
        'last_name.max' => 'Last Name must not exceed 255 characters',

        'email.required' => 'Email is Required',
        'email.email' => 'Email must be a valid email address',
        'email.max' => 'Email must not exceed 255 characters',

        'phone.string' => 'Phone must be a string',
        'phone.max' => 'Phone must not exceed 20 characters',

        'country_key.string' => 'Country Key must be a string',
        'country_key.max' => 'Country Key must not exceed 10 characters',

        'appointment_date.required' => 'Appointment Date is Required',
        'appointment_date.date' => 'Appointment Date must be a valid date',

        'start_time.required' => 'Start Time is Required',

        'end_time.required' => 'End Time is Required',
        'end_time.after' => 'End Time must be after Start Time',

        'notes.string' => 'Notes must be a string',

        'status.required' => 'Status is Required',
        'status.in' => 'Status must be one of: pending, confirmed, attended, not_attended, cancelled',
    ];

    public function updatedAppointmentDate($value)
    {
        $this->resetTimeFields();

        if (!$value) {
            return;
        }

        $selectedDate = Carbon::parse($value)->toDateString();
        $dayName = Carbon::parse($selectedDate)->format('l');

        $fullDayBlocked = BlockedDate::whereDate('date', $selectedDate)
            ->where('is_full_day', true)
            ->exists();

        if ($fullDayBlocked) {
            $this->noSlotsMessage = 'This day is not available.';
            return;
        }

        $workDay = WorkDay::where('day', $dayName)
            ->where('status', 1)
            ->first();

        if (!$workDay || !$workDay->from_time || !$workDay->to_time) {
            $this->noSlotsMessage = 'This day is not available.';
            return;
        }

        $slotDuration = (int) ($workDay->slot_duration ?? 30);
        if ($slotDuration <= 0) {
            $slotDuration = 30;
        }

        $start = Carbon::parse($selectedDate . ' ' . $workDay->from_time);
        $end   = Carbon::parse($selectedDate . ' ' . $workDay->to_time);

        $slots = [];

        while ($start->copy()->addMinutes($slotDuration) <= $end) {
            $slotStart = $start->copy();
            $slotEnd   = $start->copy()->addMinutes($slotDuration);

            $slotStartTime = $slotStart->format('H:i:s');
            $slotEndTime   = $slotEnd->format('H:i:s');

            $partialBlocked = BlockedDate::whereDate('date', $selectedDate)
                ->where('is_full_day', false)
                ->where(function ($q) use ($slotStartTime, $slotEndTime) {
                    $q->where('from_time', '<', $slotEndTime)
                        ->where('to_time', '>', $slotStartTime);
                })
                ->exists();

            if ($partialBlocked) {
                $start->addMinutes($slotDuration);
                continue;
            }

            $booked = Appointment::whereDate('appointment_date', $selectedDate)
                ->whereNotIn('status', ['cancelled'])
                ->where(function ($q) use ($slotStartTime, $slotEndTime) {
                    $q->where('start_time', '<', $slotEndTime)
                        ->where('end_time', '>', $slotStartTime);
                })
                ->exists();

            if (!$booked) {
                $slots[] = [
                    'start' => $slotStart->format('H:i:s'),
                    'end'   => $slotEnd->format('H:i:s'),
                    'label' => $slotStart->format('h:i A') . ' - ' . $slotEnd->format('h:i A'),
                ];
            }

            $start->addMinutes($slotDuration);
        }

        if (empty($slots)) {
            $this->noSlotsMessage = 'No available time slots for this day.';
            return;
        }

        $this->availableSlots = $slots;
    }

    public function updatedStartTime($value)
    {
        $this->end_time = null;

        if (!$value || empty($this->availableSlots)) {
            return;
        }

        $selectedSlot = collect($this->availableSlots)->firstWhere('start', $value);

        if ($selectedSlot) {
            $this->end_time = $selectedSlot['end'];
        }
    }

    protected function resetTimeFields()
    {
        $this->start_time = null;
        $this->end_time = null;
        $this->availableSlots = [];
        $this->noSlotsMessage = null;
    }

    protected function generateBookingReference()
    {
        $year = now()->year;
        $prefix = 'ENT-' . $year . '-';

        $lastReference = Appointment::where('booking_reference', 'like', $prefix . '%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(booking_reference, "-", -1) AS UNSIGNED) DESC')
            ->lockForUpdate()
            ->value('booking_reference');

        $nextNumber = 1;

        if ($lastReference) {
            $lastSequence = (int) substr($lastReference, strrpos($lastReference, '-') + 1);
            $nextNumber = $lastSequence + 1;
        }

        return $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $validated = $this->validate();

        $slotStillAvailable = Appointment::whereDate('appointment_date', $this->appointment_date)
            ->whereNotIn('status', ['cancelled'])
            ->where(function ($q) {
                $q->where('start_time', '<', $this->end_time)
                    ->where('end_time', '>', $this->start_time);
            })
            ->doesntExist();

        if (!$slotStillAvailable) {
            $this->addError('start_time', 'This time slot is no longer available. Please choose another one.');
            $this->updatedAppointmentDate($this->appointment_date);
            return;
        }

        try {
            DB::transaction(function () use ($validated) {
                $bookingReference = $this->generateBookingReference();

                Appointment::create([
                    'appointment_type_id' => $validated['appointment_type_id'],
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'country_key' => $validated['country_key'],
                    'appointment_date' => $validated['appointment_date'],
                    'start_time' => $validated['start_time'],
                    'end_time' => $validated['end_time'],
                    'notes' => $validated['notes'] ?? null,
                    'status' => $validated['status'],
                    'booking_reference' => $bookingReference,
                    'confirmed_at' => $validated['status'] === 'confirmed' ? now() : null,
                ]);
            });

            session()->flash('success', 'Appointment created successfully');
            return redirect()->route('super_admin.appointments-index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Error creating appointment: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.appointments.create-appointment', [
            'appointmentTypes' => AppointmentType::where('status', 1)->get(),
        ]);
    }
}
