<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermAndConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_and_conditions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('user_type');
            $table->string('term_and_condition_title_ar')->nullable();
            $table->string('term_and_condition_title_en')->nullable();
            $table->longText('term_and_condition_des_ar')->nullable();
            $table->longText('term_and_condition_des_en')->nullable();
            $table->tinyInteger('term_and_condition_status')->comment = '1 => Active  || 2 => Not Active ';
            $table->softDeletes();
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
        Schema::dropIfExists('term_and_conditions');
    }
}
