<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            "title" => "About Us",
            "image" => "uploads/about/about_us.png",
            "content" => "Founded in 2015, NITA ENGINEERING PVT. LTD. is one of the leading construction company in Nepal. Our aim is to improve physical infrastructure development which is the major tools that led to the prosperous and developed nations. Honesty and open communication have empowered NITA ENGINEERING's workforce since day one, and it shows in our work. We provide professional client focused construction solutions. We go above and beyond on every project and deliver on our promises with integrity. We offer general construction management, design-build of different projects like buildings, dam, hydropower, road etc. Our commitment to outstanding job completion, exceptional client service and superior safety performance has made us a partner of choice in the construction industry. Our team hail from every craft and expertise in the field, allowing us to combine innovative construction methods and accountable project management to get the job done and get it done right. Partnering with Nita Engineering provides your construction project with the experience needed for success. We have the experienced construction team and techniques to help you meet your goals. We are assisted by a team of qualified and experienced engineers who are well-versed in the execution of all kinds of civil engineering projects with a stubborn commitment to quality and project schedule to the entire satisfaction of all our esteemed clients. We have built our reputation by performing the highest quality works to all industries from small to a large projects. Our quality framework that we operate under ensures that our company continues to evolve in an efficient way. Being proud of our achievements, we will continue to further enhance our commitment and capabilities in the construction industry with integrity and strive for business excellence."
        ]);
    }
}
