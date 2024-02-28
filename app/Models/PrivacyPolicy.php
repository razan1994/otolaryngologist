<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrivacyPolicy extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "privacy_policies";
    protected $fillable = [
        'user_id',
        'user_type',
        'privacy_policy_title_ar',
        'privacy_policy_title_en',
        'privacy_policy_des_ar',
        'privacy_policy_des_en',
        'privacy_policy_status',
    ];
    protected $date = ['deleted_at'];



   //=======================================================================================================
    //============================================ Relations ================================================
    //=======================================================================================================

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


        // =====================================================================================================
    // ============================================= Accessors Section =====================================
    // =====================================================================================================



    public function getPrivacyPolicyTitleAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->privacy_policy_title_en}";
        }
        else{
            return "{$this->privacy_policy_title_ar}";
        }
    }

    public function getPrivacyPolicyDesAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->privacy_policy_des_en}";
        }
        else{
            return "{$this->privacy_policy_des_ar}";
        }
    }


    public function getPrivacyPolicyStatusAttribute($value)
    {
        if ($value == 1) {
            return 'Active';
        } elseif ($value == 2) {
            return 'Not Active';
        }
    }
}
