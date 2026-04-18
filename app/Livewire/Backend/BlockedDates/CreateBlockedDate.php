<?php

namespace App\Livewire\Backend\BlockedDates;

use App\Models\BlockedDate;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateBlockedDate extends Component
{
    public $date;
    public $is_full_day = true;
    public $from_time;
    public $to_time;
    public $reason;

    protected function rules()
    {
        $rules = [
            'date' => 'required|date|after_or_equal:today',
            'is_full_day' => 'required|boolean',
            'reason' => 'nullable|string|max:255',
        ];

        if (!$this->is_full_day) {
            $rules['from_time'] = 'required|date_format:H:i';
            $rules['to_time'] = 'required|date_format:H:i|after:from_time';
        }

        return $rules;
    }

    protected $messages = [
        'date.required' => 'Date is required.',
        'date.after_or_equal' => 'Date must be today or a future date.',
        'from_time.required' => 'Start time is required for partial blocking.',
        'from_time.date_format' => 'Start time format is invalid.',
        'to_time.required' => 'End time is required for partial blocking.',
        'to_time.date_format' => 'End time format is invalid.',
        'to_time.after' => 'End time must be after start time.',
    ];

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->from_time = '09:00';
        $this->to_time = '17:00';
    }

    public function updatedIsFullDay()
    {
        if ($this->is_full_day) {
            $this->from_time = null;
            $this->to_time = null;
        } else {
            $this->from_time = '09:00';
            $this->to_time = '17:00';
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $existingFullDay = BlockedDate::whereDate('date', $this->date)
                ->where('is_full_day', true)
                ->whereNull('deleted_at')
                ->exists();

            if ($existingFullDay) {
                session()->flash('error', 'A full-day block already exists for this date.');
                DB::rollBack();
                return;
            }

            if ($this->is_full_day) {
                $existingPartial = BlockedDate::whereDate('date', $this->date)
                    ->where('is_full_day', false)
                    ->whereNull('deleted_at')
                    ->exists();

                if ($existingPartial) {
                    session()->flash('error', 'Partial blocks already exist for this date. Remove them first or use one blocking strategy.');
                    DB::rollBack();
                    return;
                }
            } else {
                $overlap = BlockedDate::whereDate('date', $this->date)
                    ->where('is_full_day', false)
                    ->whereNull('deleted_at')
                    ->where(function ($query) {
                        $query->where('from_time', '<', $this->to_time)
                            ->where('to_time', '>', $this->from_time);
                    })
                    ->exists();

                if ($overlap) {
                    session()->flash('error', 'This blocked time overlaps with an existing partial block.');
                    DB::rollBack();
                    return;
                }
            }

            BlockedDate::create([
                'date' => $this->date,
                'is_full_day' => $this->is_full_day,
                'from_time' => $this->is_full_day ? null : $this->from_time,
                'to_time' => $this->is_full_day ? null : $this->to_time,
                'reason' => $this->reason,
            ]);

            DB::commit();

            session()->flash('success', 'Blocked date created successfully!');
            return redirect()->route('super_admin.blocked-dates-index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error creating blocked date: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.blocked-dates.create-blocked-date');
    }
}
