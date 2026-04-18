<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\BlockedDate;
use App\Models\WorkDay;
use Carbon\Carbon;
use Livewire\Component;

class EditAppointment extends Component
{
    public $appointmentId;
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
    public $status;

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

    public function mount($id)
    {
        $appointment = Appointment::findOrFail($id);

        $this->appointmentId = $appointment->id;
        $this->appointment_type_id = $appointment->appointment_type_id;
        $this->first_name = $appointment->first_name;
        $this->last_name = $appointment->last_name;
        $this->email = $appointment->email;
        $this->phone = $appointment->phone;
        $this->country_key = $appointment->country_key ?: '+962';
        $this->appointment_date = Carbon::parse($appointment->appointment_date)->format('Y-m-d');
        $this->start_time = $appointment->start_time ? Carbon::parse($appointment->start_time)->format('H:i:s') : null;
        $this->end_time = $appointment->end_time ? Carbon::parse($appointment->end_time)->format('H:i:s') : null;
        $this->notes = $appointment->notes;
        $this->status = $appointment->status;

        $this->loadAvailableSlots(true);
    }

    public function updatedAppointmentDate($value)
    {
        $this->start_time = null;
        $this->end_time = null;
        $this->loadAvailableSlots(false);
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

    protected function loadAvailableSlots($keepCurrentSelection = false)
    {
        $this->availableSlots = [];
        $this->noSlotsMessage = null;

        if (!$this->appointment_date) {
            return;
        }

        $selectedDate = Carbon::parse($this->appointment_date)->toDateString();
        $dayName = Carbon::parse($selectedDate)->format('l');

        $currentStart = $this->start_time ? Carbon::parse($this->start_time)->format('H:i:s') : null;
        $currentEnd = $this->end_time ? Carbon::parse($this->end_time)->format('H:i:s') : null;

        $appointment = Appointment::find($this->appointmentId);

        $isSameOriginalDate = $appointment
            && Carbon::parse($appointment->appointment_date)->toDateString() === $selectedDate;

        $fullDayBlocked = BlockedDate::whereDate('date', $selectedDate)
            ->where('is_full_day', true)
            ->exists();

        if ($fullDayBlocked && !$isSameOriginalDate) {
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
        $end = Carbon::parse($selectedDate . ' ' . $workDay->to_time);

        $slots = [];

        while ($start->copy()->addMinutes($slotDuration)->lte($end)) {
            $slotStart = $start->copy();
            $slotEnd = $start->copy()->addMinutes($slotDuration);

            $slotStartTime = $slotStart->format('H:i:s');
            $slotEndTime = $slotEnd->format('H:i:s');

            $partialBlocked = BlockedDate::whereDate('date', $selectedDate)
                ->where('is_full_day', false)
                ->where(function ($q) use ($slotStartTime, $slotEndTime) {
                    $q->where('from_time', '<', $slotEndTime)
                      ->where('to_time', '>', $slotStartTime);
                })
                ->exists();

            $booked = Appointment::whereDate('appointment_date', $selectedDate)
                ->where('id', '!=', $this->appointmentId)
                ->whereNotIn('status', ['cancelled'])
                ->where(function ($q) use ($slotStartTime, $slotEndTime) {
                    $q->where('start_time', '<', $slotEndTime)
                      ->where('end_time', '>', $slotStartTime);
                })
                ->exists();

            $isCurrentAppointmentSlot = $keepCurrentSelection
                && $currentStart === $slotStartTime
                && $currentEnd === $slotEndTime;

            if ((!$partialBlocked && !$booked) || $isCurrentAppointmentSlot) {
                $slots[] = [
                    'start' => $slotStartTime,
                    'end'   => $slotEndTime,
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

        if ($keepCurrentSelection && $currentStart) {
            $selectedSlotExists = collect($this->availableSlots)
                ->contains(fn ($slot) => $slot['start'] === $currentStart);

            if ($selectedSlotExists) {
                $this->start_time = $currentStart;
                $this->end_time = $currentEnd;
            }
        }
    }

    public function update()
    {
        $validated = $this->validate();

        $slotStillAvailable = Appointment::whereDate('appointment_date', $this->appointment_date)
            ->where('id', '!=', $this->appointmentId)
            ->whereNotIn('status', ['cancelled'])
            ->where(function ($q) {
                $q->where('start_time', '<', $this->end_time)
                  ->where('end_time', '>', $this->start_time);
            })
            ->doesntExist();

        if (!$slotStillAvailable) {
            $this->addError('start_time', 'This time slot is no longer available. Please choose another one.');
            $this->loadAvailableSlots(false);
            return;
        }

        $fullDayBlocked = BlockedDate::whereDate('date', $this->appointment_date)
            ->where('is_full_day', true)
            ->exists();

        if ($fullDayBlocked) {
            $originalAppointment = Appointment::find($this->appointmentId);

            if (
                !$originalAppointment ||
                Carbon::parse($originalAppointment->appointment_date)->toDateString() !== $this->appointment_date
            ) {
                $this->addError('appointment_date', 'This day is not available.');
                $this->loadAvailableSlots(false);
                return;
            }
        }

        $partialBlocked = BlockedDate::whereDate('date', $this->appointment_date)
            ->where('is_full_day', false)
            ->where(function ($q) {
                $q->where('from_time', '<', $this->end_time)
                  ->where('to_time', '>', $this->start_time);
            })
            ->exists();

        if ($partialBlocked) {
            $originalAppointment = Appointment::find($this->appointmentId);

            $originalStart = $originalAppointment && $originalAppointment->start_time
                ? Carbon::parse($originalAppointment->start_time)->format('H:i:s')
                : null;

            $originalEnd = $originalAppointment && $originalAppointment->end_time
                ? Carbon::parse($originalAppointment->end_time)->format('H:i:s')
                : null;

            $sameOriginalSlot = $originalAppointment
                && Carbon::parse($originalAppointment->appointment_date)->toDateString() === $this->appointment_date
                && $originalStart === Carbon::parse($this->start_time)->format('H:i:s')
                && $originalEnd === Carbon::parse($this->end_time)->format('H:i:s');

            if (!$sameOriginalSlot) {
                $this->addError('start_time', 'This selected time is blocked.');
                $this->loadAvailableSlots(false);
                return;
            }
        }

        try {
            $appointment = Appointment::findOrFail($this->appointmentId);
            $oldStatus = $appointment->status;

            $appointment->update([
                'appointment_type_id' => $validated['appointment_type_id'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'country_key' => $validated['country_key'],
                'appointment_date' => $validated['appointment_date'],
                'start_time' => Carbon::parse($validated['start_time'])->format('H:i:s'),
                'end_time' => Carbon::parse($validated['end_time'])->format('H:i:s'),
                'notes' => $validated['notes'] ?? null,
                'status' => $validated['status'],
                'confirmed_at' => ($validated['status'] === 'confirmed' && $oldStatus !== 'confirmed') ? now() : $appointment->confirmed_at,
                'cancelled_at' => ($validated['status'] === 'cancelled' && $oldStatus !== 'cancelled') ? now() : $appointment->cancelled_at,
            ]);

            session()->flash('success', 'Appointment updated successfully');
            return redirect()->route('super_admin.appointments-index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Error updating appointment: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.appointments.edit-appointment', [
            'appointmentTypes' => AppointmentType::where('status', 1)->get(),
        ]);
    }
}
