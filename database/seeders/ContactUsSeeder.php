<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActivityLog;
use App\Models\ContactUs;
use App\Models\ContactUsLog;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUs::create([
            'email' => 'email@gmail.com',
            'phone' => 'Please enter the phone number',
            'phone2' => 'Please enter the second phone number',
            'address_ar' => 'Please enter the address in Arabic',
            'address_en' => 'Please enter the address in English',
            'address_ar2' => 'Please enter the second address in Arabic',
            'address_en2' => 'Please enter the second address in English',
            'latitude' => 31.950615,
            'longitude' => 35.904876,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
