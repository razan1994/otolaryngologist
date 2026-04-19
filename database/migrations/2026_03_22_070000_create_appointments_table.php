<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_type_id')->constrained('appointment_types')->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('country_key')->nullable();

            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->text('notes')->nullable();

            $table->enum('status', [
                'pending',
                'confirmed',
                'attended',
                'not_attended',
                'cancelled'
            ])->default('pending');

            $table->string('booking_reference')->nullable()->unique();

            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['appointment_date', 'start_time']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
