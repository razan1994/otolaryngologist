<?php

namespace App\Livewire\Backend\PublicSettings;

use App\Models\PublicSetting;
use Livewire\Component;

class CreatePublicSetting extends Component
{
    public $key;
    public $value;
    public $type = 'string';
    public $description;

    protected $rules = [
        'key' => 'required|string|max:255|unique:public_settings,key',
        'value' => 'nullable|string',
        'type' => 'required|in:string,boolean,integer,json',
        'description' => 'nullable|string|max:255',
    ];

    protected $messages = [
        'key.required' => 'Setting Key is Required',
        'key.string' => 'Setting Key must be a string',
        'key.max' => 'Setting Key must not exceed 255 characters',
        'key.unique' => 'This Setting Key already exists',

        'value.string' => 'Setting Value must be a string',

        'type.required' => 'Type is Required',
        'type.in' => 'Type must be one of: string, boolean, integer, json',

        'description.string' => 'Description must be a string',
        'description.max' => 'Description must not exceed 255 characters',
    ];

    public function save()
    {
        $this->validate();

        try {
            // Validate JSON format if type is json
            if ($this->type === 'json' && !empty($this->value)) {
                json_decode($this->value);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    session()->flash('danger', 'Invalid JSON format');
                    return;
                }
            }

            PublicSetting::create([
                'key' => $this->key,
                'value' => $this->value,
                'type' => $this->type,
                'description' => $this->description,
            ]);

            session()->flash('success', 'Setting created successfully');
            return redirect()->route('super_admin.public_settings-index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Error creating setting: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.public-settings.create-public-setting');
    }
}
