<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'duration',
        'description_ar',
        'description_en',
        'status',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}
