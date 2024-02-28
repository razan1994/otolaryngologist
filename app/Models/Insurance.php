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



    // ===================================================================================
    // =================================== Accessories ===================================
    // ===================================================================================



    public function getTitleAttribute()
    {
        if (Config::get('app.locale') == 'en'){
            return "{$this->title_en}";
        }
        else{
            return "{$this->title_ar}";
        }
    }


}
