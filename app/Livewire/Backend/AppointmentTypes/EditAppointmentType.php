<?php

namespace App\Livewire\Backend\AppointmentTypes;

use App\Models\AppointmentType;
use Livewire\Component;

class EditAppointmentType extends Component
{
    public $appointmentTypeId;
    public $name_ar;
    public $name_en;
    public $duration;
    public $description_ar;
    public $description_en;
    public $status;

    protected $rules = [
        'name_ar' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'duration' => 'required|integer|min:5',
        'description_ar' => 'nullable|string',
        'description_en' => 'nullable|string',
        'status' => 'required|numeric',
    ];

    protected $messages = [
        'name_ar.required' => 'Name AR is Required',
        'name_ar.string' => 'Name AR must be a string',
        'name_ar.max' => 'Name AR must not exceed 255 characters',

        'name_en.required' => 'Name EN is Required',
        'name_en.string' => 'Name EN must be a string',
        'name_en.max' => 'Name EN must not exceed 255 characters',

        'duration.required' => 'Duration is Required',
        'duration.integer' => 'Duration must be an integer',
        'duration.min' => 'Duration must be at least 5 minutes',

        'description_ar.string' => 'Description AR must be a string',
        'description_en.string' => 'Description EN must be a string',

        'status.required' => 'Status is Required',
        'status.numeric' => 'Status must be numeric',
    ];

    public function mount($id)
    {
        $appointmentType = AppointmentType::findOrFail($id);

        $this->appointmentTypeId = $appointmentType->id;
        $this->name_ar = $appointmentType->name_ar;
        $this->name_en = $appointmentType->name_en;
        $this->duration = $appointmentType->duration;
        $this->description_ar = $appointmentType->description_ar;
        $this->description_en = $appointmentType->description_en;
        $this->status = $appointmentType->status;
    }

    public function update()
    {
        $this->validate();

        try {
            $appointmentType = AppointmentType::findOrFail($this->appointmentTypeId);

            $appointmentType->update([
                'name_ar' => $this->name_ar,
                'name_en' => $this->name_en,
                'duration' => $this->duration,
                'description_ar' => $this->description_ar,
                'description_en' => $this->description_en,
                'status' => $this->status,
            ]);

            session()->flash('success', 'Appointment Type updated successfully');
            return redirect()->route('super_admin.appointment-types-index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Error updating appointment type: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.appointment-types.edit-appointment-type');
    }
}
