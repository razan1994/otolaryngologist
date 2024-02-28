<?php

namespace Database\Seeders;

use App\Models\SeoOperation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Welcome',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'About Clinic',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'About Dr',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Insurance',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Blogs',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Contact Us',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Faq',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Gallery',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Treatments',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Privacy',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        SeoOperation::create([
            'user_id'=>1,
            'user_type'=>'Super Admin',
            'page_name'=>'Terms',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
