<?php

namespace App\Livewire\Backend\WorkDays;

use Livewire\Component;
use App\Models\WorkDay;
use Illuminate\Support\Facades\DB;

class WeeklySchedule extends Component
{
    public $days = [
        'Saturday' => ['enabled' => false, 'from_time' => '09:00', 'to_time' => '17:00', 'slot_duration' => 30],
        'Sunday' => ['enabled' => false, 'from_time' => '09:00', 'to_time' => '17:00', 'slot_duration' => 30],
        'Monday' => ['enabled' => false, 'from_time' => '09:00', 'to_time' => '17:00', 'slot_duration' => 30],
        'Tuesday' => ['enabled' => false, 'from_time' => '09:00', 'to_time' => '17:00', 'slot_duration' => 30],
        'Wednesday' => ['enabled' => false, 'from_time' => '09:00', 'to_time' => '17:00', 'slot_duration' => 30],
        'Thursday' => ['enabled' => false, 'from_time' => '09:00', 'to_time' => '17:00', 'slot_duration' => 30],
        'Friday' => ['enabled' => false, 'from_time' => '09:00', 'to_time' => '17:00', 'slot_duration' => 30],
    ];

    protected $rules = [
        'days.*.from_time' => 'required_if:days.*.enabled,true|date_format:H:i',
        'days.*.to_time' => 'required_if:days.*.enabled,true|date_format:H:i',
        'days.*.slot_duration' => 'required_if:days.*.enabled,true|integer|min:5',
    ];

    protected $messages = [
        'days.*.from_time.required_if' => 'From time is required.',
        'days.*.from_time.date_format' => 'From time format is invalid.',
        'days.*.to_time.required_if' => 'To time is required.',
        'days.*.to_time.date_format' => 'To time format is invalid.',
        'days.*.slot_duration.required_if' => 'Slot duration is required.',
        'days.*.slot_duration.integer' => 'Slot duration must be a number.',
        'days.*.slot_duration.min' => 'Slot duration must be at least 5 minutes.',
    ];

    public function mount()
    {
        $this->loadSchedule();
    }

    public function loadSchedule()
    {
        $workDays = WorkDay::whereNull('deleted_at')->get()->keyBy('day');

        foreach ($this->days as $day => $config) {
            if (isset($workDays[$day])) {
                $workDay = $workDays[$day];

                $this->days[$day]['enabled'] = (int) $workDay->status === 1;
                $this->days[$day]['from_time'] = $workDay->from_time
                    ? date('H:i', strtotime($workDay->from_time))
                    : '09:00';
                $this->days[$day]['to_time'] = $workDay->to_time
                    ? date('H:i', strtotime($workDay->to_time))
                    : '17:00';
                $this->days[$day]['slot_duration'] = $workDay->slot_duration ?: 30;
            } else {
                $this->days[$day]['enabled'] = false;
                $this->days[$day]['from_time'] = '09:00';
                $this->days[$day]['to_time'] = '17:00';
                $this->days[$day]['slot_duration'] = 30;
            }
        }

        $this->dispatch('scheduleLoaded');
    }

    public function save()
    {
        $this->validate();

        foreach ($this->days as $day => $config) {
            if ($config['enabled'] && strtotime($config['to_time']) <= strtotime($config['from_time'])) {
                $this->addError("days.$day.to_time", 'To time must be after From time.');
                return;
            }
        }

        try {
            DB::beginTransaction();

            foreach ($this->days as $day => $config) {
                WorkDay::updateOrCreate(
                    ['day' => $day],
                    [
                        'from_time' => $config['enabled'] ? $config['from_time'] : null,
                        'to_time' => $config['enabled'] ? $config['to_time'] : null,
                        'slot_duration' => $config['slot_duration'] ?: 30,
                        'status' => $config['enabled'] ? 1 : 2,
                    ]
                );
            }

            DB::commit();

            session()->flash('message', 'Weekly schedule saved successfully!');
            $this->dispatch('scheduleUpdated');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error saving schedule: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.work-days.weekly-schedule');
    }
}
