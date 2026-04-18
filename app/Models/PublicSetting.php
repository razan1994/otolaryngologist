<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'description',
    ];

    public function getValueAttribute($value)
    {
        return match ($this->type) {
            'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'integer' => (int) $value,
            'json' => json_decode($value, true),
            default => $value,
        };
    }

    public function setValueAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['value'] = json_encode($value);
            $this->attributes['type'] = 'json';
        } else {
            $this->attributes['value'] = $value;
        }
    }

    /**
     * Get a setting value by key.
     *
     * Usage: PublicSetting::get('clinic_name', 'Default Clinic')
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by key.
     *
     * Usage: PublicSetting::set('clinic_name', 'New Clinic Name')
     */
    public static function set(string $key, mixed $value, string $type = 'string', ?string $description = null): static
    {
        return static::updateOrCreate(
            ['key' => $key],
            array_filter([
                'value' => $value,
                'type' => $type,
                'description' => $description,
            ], fn ($v) => $v !== null)
        );
    }
}
