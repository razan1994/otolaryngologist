<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;
    use SoftDeletes;

    // ===================================================================================================================
    // ============================================== Standard Section ===================================================
    // ===================================================================================================================
    protected $table = "faqs";
    protected $fillable = [
        'title_ar',
        'title_en',
        'answer_ar',
        'answer_en',
        'status',
        'created_by',
    ];
    protected $date = ['deleted_at'];

    // ===================================================================================================================
    // ============================================= Accessors Section ===================================================
    // ===================================================================================================================
    public function getStatusAttribute($value)
    {
        if ($value == 1) {
            return 'Active';
        } elseif ($value == 2) {
            return 'Inactive';
        }
    }

    public function getTitleAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->title_en}";
        }
        else{
            return "{$this->title_ar}";
        }
    }


    public function getAnswerAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->answer_en}";
        }
        else{
            return "{$this->answer_ar}";
        }
    }

    
}
