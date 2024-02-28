<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'about_dr_ar'=>'about_dr_ar',
            'about_dr_en'=>'about_dr_en',
            'about_clinic_ar'=>'about_clinic_ar',
            'about_clinic_en'=>'about_clinic_en',
            'insurance_text_ar'=>'insurance_text_ar',
            'insurance_text_en'=>'insurance_text_en'
        ]);
    }
}
