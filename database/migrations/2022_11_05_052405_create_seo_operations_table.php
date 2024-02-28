<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_operations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('user_type')->nullable();
            $table->string('page_name')->nullable();
            $table->longText('seo_title_ar')->nullable();
            $table->longText('seo_title_en')->nullable();
            $table->longText('meta_desc_ar')->nullable();
            $table->longText('meta_desc_en')->nullable();
            $table->longText('keywords_ar')->nullable();
            $table->longText('keywords_en')->nullable();
            $table->longText('redirect_301_ar')->nullable();
            $table->longText('redirect_301_en')->nullable();
            $table->longText('h1_val_en')->nullable();
            $table->longText('h1_val_ar')->nullable();
            $table->longText('h2_val_en')->nullable();
            $table->longText('h2_val_ar')->nullable();
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
        Schema::dropIfExists('seo_operations');
    }
};
