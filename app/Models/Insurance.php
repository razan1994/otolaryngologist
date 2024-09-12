<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Insurance extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "insurances";
    protected $fillable = [
        'title_ar',
        'title_en',
    ];


    protected $date = ['deleted_at'];
    // Relation With User Table
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }



        // ==========================================================================
    // ================================ Accessories =============================
    // ==========================================================================



    public function getAliasNameAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->alias_name_en}";
        }
        else{
            return "{$this->alias_name_ar}";
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

    public function getDescriptionAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->desc_en}";
        }
        else{
            return "{$this->desc_ar}";
        }
    }
    public function getAltAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->alt_text_en}";
        }
        else{
            return "{$this->alt_text_ar}";
        }
    }

    public function getSeoTitleAttribute()
    {

        if (Config::get('app.locale') == 'en'){
            if($this->seo_title_en != null){
                return "{$this->seo_title_en}";
            }else{
                return null;
            }
        }
        else{
            if($this->seo_title_ar != null){
                return "{$this->seo_title_ar}";
            }else{
                return null;
            }
        }
    }



    public function getKeywordsAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->keywords_en}";
        }
        else{
            return "{$this->keywords_ar}";
        }
    }



    public function getRedirect_301Attribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->redirect_301_en}";
        }
        else{
            return "{$this->redirect_301_ar}";
        }
    }



    public function getMetaDescAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            if($this->meta_desc_en != null){
                return "{$this->meta_desc_en}";
            }else{
                return null;
            }
        }
        else{
            if($this->meta_desc_ar != null){
                return "{$this->meta_desc_ar}";
            }else{
                return null;
            }
        }

    }
    public function getH1ValAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->h1_val_en}";
        }
        else{
            return "{$this->h1_val_ar}";
        }
    }
    public function getH2ValAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->h2_val_en}";
        }
        else{
            return "{$this->h2_val_ar}";
        }
    }

    public function getImageTitleAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->image_title_text_en}";
        }
        else{
            return "{$this->image_title_text_ar}";
        }
    }


}
