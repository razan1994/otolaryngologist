<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivacyPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacy_policies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('user_type');
            $table->string('privacy_policy_title_ar')->nullable();
            $table->string('privacy_policy_title_en')->nullable();
            $table->longText('privacy_policy_des_ar')->nullable();
            $table->longText('privacy_policy_des_en')->nullable();
            $table->tinyInteger('privacy_policy_status')->comment = '1 => Active  || 2 => Not Active ';
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
        Schema::dropIfExists('privacy_policies');
    }
}
