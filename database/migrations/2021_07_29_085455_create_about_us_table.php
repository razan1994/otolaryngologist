<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->longText('about_dr_ar')->nullable();
            $table->longText('about_dr_en')->nullable();
            $table->longText('about_clinic_ar')->nullable();
            $table->longText('about_clinic_en')->nullable();
            $table->longText('insurance_text_ar')->nullable();
            $table->longText('insurance_text_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
