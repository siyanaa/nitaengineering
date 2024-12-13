<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            "role" => "Engineering Geologist",
            "name" => "Bishnu Shiwakoti",
            "position" => "Engineering Geologist",
            "image" => "uploads/team/bishnu.jpg",
            "email" => "test@mail.com",
            "contact_number" => "01-6922762",
            "comment" => "Test Comment",
            "facebook" => "https://www.facebook.com/"
        ]);

        Team::create([
            "role" => "District Project Officer",
            "name" => "Suresh Chaudhary",
            "position" => "District Project Officer",
            "image" => "uploads/team/suresh.jpg",
            "email" => "test@mail.com",
            "contact_number" => "01-6922762",
            "comment" => "Test Comment",
            "facebook" => "https://www.facebook.com/"
        ]);

        Team::create([
            "role" => "Geomatics Engineer",
            "name" => "Prabin Gyawali",
            "position" => "Geomatics Engineer",
            "image" => "uploads/team/prabin.jpg",
            "email" => "test@mail.com",
            "contact_number" => "01-6922762",
            "comment" => "Test Comment",
            "facebook" => "https://www.facebook.com/"
        ]);
    }
}
