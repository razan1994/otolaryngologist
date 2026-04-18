<?php

namespace Database\Seeders;

use App\Models\PublicSetting;
use Illuminate\Database\Seeder;

class PublicSettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'key' => 'clinic_name',
                'value' => 'Otolaryngologist Clinic',
                'type' => 'string',
                'description' => 'The name of the clinic',
            ],
            [
                'key' => 'phone_number',
                'value' => '+962-000-0000',
                'type' => 'string',
                'description' => 'Clinic phone number',
            ],
            [
                'key' => 'email',
                'value' => 'info@clinic.com',
                'type' => 'string',
                'description' => 'Clinic email address',
            ],
            [
                'key' => 'booking_page_description',
                'value' => 'Book your appointment online easily.',
                'type' => 'string',
                'description' => 'Description shown on the booking page',
            ],
            [
                'key' => 'allow_online_booking',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Enable or disable online booking',
            ],
        ];

        foreach ($settings as $setting) {
            PublicSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
