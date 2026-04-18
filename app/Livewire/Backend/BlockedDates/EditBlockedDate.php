<?php

namespace App\Livewire\Backend\BlockedDates;

use Livewire\Component;
use App\Models\BlockedDate;
use Illuminate\Support\Facades\DB;

class EditBlockedDate extends Component
{
    public $blockedDateId;
    public $date;
    public $is_full_day;
    public $from_time;
    public $to_time;
    public $reason;

    protected function rules()
    {
        $rules = [
            'date' => 'required|date',
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
        'from_time.required' => 'Start time is required for partial blocking.',
        'to_time.required' => 'End time is required for partial blocking.',
        'to_time.after' => 'End time must be after start time.',
    ];

    public function mount($id)
    {
        $blockedDate = BlockedDate::findOrFail($id);
        $this->blockedDateId = $blockedDate->id;
        $this->date = $blockedDate->date ? \Carbon\Carbon::parse($blockedDate->date)->format('Y-m-d') : now()->format('Y-m-d');
        $this->is_full_day = $blockedDate->is_full_day;
        $this->from_time = $blockedDate->from_time;
        $this->to_time = $blockedDate->to_time;
        $this->reason = $blockedDate->reason;
    }

    public function updatedIsFullDay()
    {
        if ($this->is_full_day) {
            $this->from_time = null;
            $this->to_time = null;
        } else {
            if (!$this->from_time) $this->from_time = '09:00';
            if (!$this->to_time) $this->to_time = '17:00';
        }
    }

    public function update()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $blockedDate = BlockedDate::findOrFail($this->blockedDateId);
            $blockedDate->update([
                'date' => $this->date,
                'is_full_day' => $this->is_full_day,
                'from_time' => $this->is_full_day ? null : $this->from_time,
                'to_time' => $this->is_full_day ? null : $this->to_time,
                'reason' => $this->reason,
            ]);

            DB::commit();

            session()->flash('success', 'Blocked date updated successfully!');
            return redirect()->route('super_admin.blocked-dates-index');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error updating blocked date: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.blocked-dates.edit-blocked-date');
    }
}
