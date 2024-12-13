<?php

namespace Database\Seeders;
use App\Models\Mvc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MvcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mvc::create([
            'title' => 'Mission',
            'description' => 'Nita Engineering is the innovative leader and heavy civil construction and services that connect and improve the world’s communities. We are guided by our values-based culture and the dedication of the employee family that has helped us succeed. We consistently deliver superior client satisfaction and are committed to a safe and rewarding work environment that is essential to long-term success for our owners, partners, and employees.'
        ]);

        Mvc::create([
            'title' => 'Vision',
            'description' => 'Nita Engineering will be recognized worldwide as the preferred partner to build innovative construction solutions. The character and expertise of our employees, and focus on being a high-quality, ethical, community-minded company, will drive superior financial returns.'
        ]);

        Mvc::create([
            'title' => 'Values',
            'description' => '“Our tradition is based on integrity & commitment to excellence.”

            Integrity
            Honesty & Openness
            Trustworthy
            Safety
            Teamwork
            Care for People'
        ]);
    }
}
