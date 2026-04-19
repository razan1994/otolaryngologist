<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'appointment_type_id',
        'first_name',
        'last_name',
        'phone',
        'country_key',
        'appointment_date',
        'start_time',
        'end_time',
        'notes',
        'status',
        'booking_reference',
        'confirmed_at',
        'cancelled_at',
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'confirmed_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }

    public function logs()
    {
        return $this->hasMany(AppointmentLog::class);
    }

    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
