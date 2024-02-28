<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TermAndCondition extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "term_and_conditions";
    protected $fillable = [
        'user_id',
        'user_type',
        'term_and_condition_title_ar',
        'term_and_condition_title_en',
        'term_and_condition_des_ar',
        'term_and_condition_des_en',
        'term_and_condition_status',
    ];
    protected $date = ['deleted_at'];
    //=======================================================================================================
    //============================================ Relations ================================================
    //=======================================================================================================

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    // ===================================================================================================================
    // ============================================= Accessors Section ===================================================
    // ===================================================================================================================

    public function getTermAndConditionStatusAttribute($value)
    {
        if ($value == 1) {
            return 'Active';
        } elseif ($value == 2) {
            return 'Not Active';
        }
    }


    public function getTermAndConditionTitleAttribute()
    {
        if (Config::get('app.locale') == 'en') {
            return "{$this->term_and_condition_title_en}";
        } else {
            return "{$this->term_and_condition_title_ar}";
        }
    }

    public function getTermAndConditionDesAttribute()
    {
        if (Config::get('app.locale') == 'en') {
            return "{$this->term_and_condition_des_en}";
        } else {
            return "{$this->term_and_condition_des_ar}";
        }
    }
}
