<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppointmentType;

class AppointmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppointmentType::create([
            'name_ar' => 'استشارة عامة',
            'name_en' => 'General Consultation',
            'duration' => 30,
            'description_ar' => 'استشارة طبية عامة',
            'description_en' => 'General medical consultation',
            'status' => 1 // Active
        ]);
    }
}
