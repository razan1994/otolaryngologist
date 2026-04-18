<?php

namespace App\Livewire\Backend\PublicSettings;

use App\Models\PublicSetting;
use Livewire\Component;

class EditPublicSetting extends Component
{
    public $settingId;
    public $key;
    public $value;
    public $type;
    public $description;

    protected $rules = [
        'key' => 'required|string|max:255',
        'value' => 'nullable|string',
        'type' => 'required|in:string,boolean,integer,json',
        'description' => 'nullable|string|max:255',
    ];

    protected $messages = [
        'key.required' => 'Setting Key is Required',
        'key.string' => 'Setting Key must be a string',
        'key.max' => 'Setting Key must not exceed 255 characters',

        'value.string' => 'Setting Value must be a string',

        'type.required' => 'Type is Required',
        'type.in' => 'Type must be one of: string, boolean, integer, json',

        'description.string' => 'Description must be a string',
        'description.max' => 'Description must not exceed 255 characters',
    ];

    public function mount($id)
    {
        $setting = PublicSetting::findOrFail($id);

        $this->settingId = $setting->id;
        $this->key = $setting->key;
        $this->type = $setting->getRawOriginal('type');
        $this->description = $setting->getRawOriginal('description');

        // Get the raw value for editing
        $rawValue = $setting->getRawOriginal('value');
        if ($this->type === 'json') {
            $this->value = $rawValue;
        } elseif ($this->type === 'boolean') {
            $this->value = filter_var($rawValue, FILTER_VALIDATE_BOOLEAN) ? '1' : '0';
        } else {
            $this->value = $rawValue;
        }
    }

    public function update()
    {
        $this->validate();

        try {
            $setting = PublicSetting::findOrFail($this->settingId);

            // Validate JSON format if type is json
            if ($this->type === 'json' && !empty($this->value)) {
                json_decode($this->value);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    session()->flash('danger', 'Invalid JSON format');
                    return;
                }
            }

            $setting->update([
                'key' => $this->key,
                'value' => $this->value,
                'type' => $this->type,
                'description' => $this->description,
            ]);

            session()->flash('success', 'Setting updated successfully');
            return redirect()->route('super_admin.public_settings-index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Error updating setting: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.public-settings.edit-public-setting');
    }
}
