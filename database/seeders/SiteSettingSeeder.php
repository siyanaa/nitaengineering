<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SiteSetting::create([
            'address'=>'New Baneshwor, Kathmandu',
            'phone'=>'01-6922762',
            'email'=>'nitaengineering123@gmail.com',
            'global_certification'=>'global_certification',
            'facebook_link'=>'https://www.facebook.com/',
            'instagram_link'=>'https://www.instagram.com/',
            'twitter_link'=>'https://www.twitter.com/',
            'github_link'=>'https://www.github.com/',
            'main_logo'=>'main_logo.png',
            'side_logo'=>'side_logo.png',
           
        ]);
    }
}
