<?php

namespace App\Livewire\Backend\WorkDays;

use App\Models\WorkDay;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateWorkDay extends Component
{
    public $day;
    public $from_time;
    public $to_time;
    public $slot_duration = 30;
    public $status = 1;

    public $days = [
        'Saturday',
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
    ];

    protected function rules()
    {
        return [
            'day' => ['required', Rule::in($this->days)],
            'from_time' => ['required', 'date_format:H:i'],
            'to_time' => ['required', 'date_format:H:i', 'after:from_time'],
            'slot_duration' => ['required', 'integer', 'min:5'],
            'status' => ['required', 'in:1,2'],
        ];
    }

    protected $messages = [
        'day.required' => 'Please select a day.',
        'day.in' => 'The selected day is invalid.',
        'from_time.required' => 'Please enter the start time.',
        'from_time.date_format' => 'Start time format is invalid.',
        'to_time.required' => 'Please enter the end time.',
        'to_time.date_format' => 'End time format is invalid.',
        'to_time.after' => 'End time must be after start time.',
        'slot_duration.required' => 'Please enter the slot duration.',
        'slot_duration.integer' => 'Slot duration must be a number.',
        'slot_duration.min' => 'Slot duration must be at least 5 minutes.',
        'status.required' => 'Please select a status.',
        'status.in' => 'The selected status is invalid.',
    ];

    public function mount()
    {
        $this->from_time = '09:00';
        $this->to_time = '17:00';
        $this->slot_duration = 30;
        $this->status = 1;
    }

    public function save()
    {
        $this->validate();

        WorkDay::updateOrCreate(
            ['day' => $this->day],
            [
                'from_time' => $this->from_time,
                'to_time' => $this->to_time,
                'slot_duration' => $this->slot_duration,
                'status' => $this->status,
            ]
        );

        session()->flash('success', 'Work day saved successfully.');
        return redirect()->route('super_admin.work-days-index');
    }

    public function render()
    {
        return view('livewire.backend.work-days.create-work-day');
    }
}
