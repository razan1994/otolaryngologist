<?php

namespace App\Livewire\Backend\WorkDays;

use App\Models\WorkDay;
use Livewire\Component;

class EditWorkDay extends Component
{
    public $workDayId;
    public $day;
    public $from_time;
    public $to_time;
    public $slot_duration;
    public $is_active;
    public $status;

    public $days = [
        'Saturday',
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday'
    ];

    protected $rules = [
        'day' => 'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
        'from_time' => 'required',
        'to_time' => 'required|after:from_time',
        'slot_duration' => 'required|integer|min:5',
        'status' => 'required|in:1,2',
    ];

    protected $messages = [
        'day.required' => 'Please select a day.',
        'day.in' => 'The selected day is invalid.',
        'from_time.required' => 'Please enter the start time.',
        'to_time.required' => 'Please enter the end time.',
        'to_time.after' => 'End time must be after start time.',
        'slot_duration.required' => 'Please enter the slot duration.',
        'slot_duration.integer' => 'Slot duration must be a number.',
        'slot_duration.min' => 'Slot duration must be at least 5 minutes.',
        'status.required' => 'Please select a status.',
        'status.in' => 'The selected status is invalid.',
    ];

    public function mount($id)
    {
        $workDay = WorkDay::findOrFail($id);

        $this->workDayId = $workDay->id;
        $this->day = $workDay->day;
        $this->from_time = $workDay->from_time;
        $this->to_time = $workDay->to_time;
        $this->slot_duration = $workDay->slot_duration;
        $this->is_active = $workDay->is_active;
        $this->status = $workDay->status;
    }

    public function update()
    {
        $this->validate();

        $workDay = WorkDay::findOrFail($this->workDayId);

        $workDay->update([
            'day' => $this->day,
            'from_time' => $this->from_time,
            'to_time' => $this->to_time,
            'slot_duration' => $this->slot_duration,
            'is_active' => $this->is_active,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Work day updated successfully.');
        return redirect()->route('super_admin.work-days-index');
    }

    public function render()
    {
        return view('livewire.backend.work-days.edit-work-day');
    }
}
