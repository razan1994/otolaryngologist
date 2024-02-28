<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;

    // ===================================================================================================================
    // ============================================== Standard Section ===================================================
    // ===================================================================================================================
    protected $table = 'about_us';
    protected $guarded = [];


    //=======================================================================================================
    //============================================ Relations ================================================
    //=======================================================================================================


    // =====================================================================================================
    // ============================================= Accessors Section =====================================
    // =====================================================================================================


    public function getAboutUsTitleAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->title_en}";
        }
        else{
            return "{$this->title_ar}";
        }
    }
    public function getAboutUsDrAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->about_dr_en}";
        }
        else{
            return "{$this->about_dr_ar}";
        }
    }
    public function getAboutUsClinicAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->about_clinic_en}";
        }
        else{
            return "{$this->about_clinic_ar}";
        }
    }
    public function getAboutUsInsuranceAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->insurance_text_en}";
        }
        else{
            return "{$this->insurance_text_ar}";
        }
    }

    public function getVisionAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->vision_en}";
        }
        else{
            return "{$this->vision_ar}";
        }
    }

    public function getMissionAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->mission_en}";
        }
        else{
            return "{$this->mission_ar}";
        }
    }


}
