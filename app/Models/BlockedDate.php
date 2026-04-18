<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlockedDate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'date',
        'is_full_day',
        'from_time',
        'to_time',
        'reason',
    ];

    protected $casts = [
        'date' => 'date',
        'is_full_day' => 'boolean',
    ];
}

