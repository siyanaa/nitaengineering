<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            "title" => "Building Construction",
            "description" => "Construction, also called building construction, the techniques and industry involved in the assembly construction of structures, primarily those used to provide shelter. Construction is an ancient human activity. It began with the purely functional need for a controlled environment to moderate the effects of climate. 
            Building design and structural work forms an integral part of our activities. We have been responsible for the construction of a number of landmark buildings across Nepal. Our capabilities include high-rise and specialty developments in the residential, commercial and retail sectors like auditorium, hospital building, airport etc. along with building hi-tech manufacturing facilities and facilities where quality and timely delivery are of paramount importance, such as hotels and airports as well.
            Building or owning a house is among the most amazing things that most people yearn for. We build it using quality, standardized materials. We also ensure that the right building procedures and practices are followed. We allow the client to select systems that best suit their needs and meet their project budget.",
            "icon" => "service-icon1.png",
            "image" => "building_construction.jpg"
        ]);

        Service::create([
            "title" => "Bridge Construction",
            "description" => "Bridge, structure that spans horizontally between supports, whose function is to carry vertical loads. The prototypical bridge is quite simple—two supports holding up a beam. The supports must be strong enough to hold the structure up, and the span between supports must be strong enough to carry the loads. Spans are generally made as short as possible; long spans are justified where good foundations are limited. Our agenda is to be as efficient, as economical, and as elegant as is safely possible. Efficiency is a scientific principle that puts a value on reducing materials while increasing performance. Economy is a social principle that puts value on reducing the costs of construction and maintenance while retaining efficiency. Finally, elegance is a symbolic or visual principle that puts value on the personal expression of the designer without compromising performance or economy.
            We are capable of designing and building projects, including all types of foundations such as open/shallow foundation, well sinking, bore pile, arch bridge, suspension bridge etc. Efficient deployment of resources is at the core of our company competence.",
            "icon" => "service-icon2.png",
            "image" => "bridge_construction.jpg"
        ]);

        Service::create([
            "title" => "Hydropower Construction",
            "description" => "Due to its multiple services and benefits, hydropower is expected to remain the world's largest source of renewable electricity for years to come and with significant untapped hydropower potential.
            Nepal is blessed with perennial nature rivers with enormous amounts of water, sources of which come from the mighty Himalayan Range. Furthermore, the steep gradient of the country's topography provides ideal conditions for the development of some of the world's largest hydroelectric projects in Nepal. Current estimates show that Nepal has the hydropower potential of 83000 MW among which 40000 MW is economically feasible. However, Nepal has an electric power of total installed capacity of 609 MW only. With this scenario and having immense potential of hydropower development, it is important for Nepal to increase its
            energy dependence on electricity with hydropower development.
            For big projects like Hydropower, we have an extensive manpower and the possession of such resources which makes us capable in the challenging tasks. We are continuously striving to strengthen our core competence in hydropower. We have built an extensive network of sub-contractors and suppliers to strengthen our capabilities to support any large scale hydropower project with various types of civil work.",
            "icon" => "service-icon3.png",
            "image" => "hydropower_construction.jpg"
        ]);

        Service::create([
            "title" => "Road Construction",
            "description" => "The methods of construction roads have changed a lot since the first roads were built around 4000 BC-made of stone and timber. Road construction techniques were gradually improved by the study of road traffic, stone thickness, road alignment, and slope gradients, developing to use stones that were laid in a regular, compact design, and covered with smaller stones to produce a solid layer. Modern roads tend to be constructed using asphalt and/or concrete.
            Nita Engineering manages the sourcing of equipment, labour hire, supplies and also the project planning of all major road construction projects. Our process for major road constructions starts with understanding the needs of the project and ends with delivering the project safely and within the scheduled time, budget and quality parameters.",
            "icon" => "service-icon4.png",
            "image" => "road_construction.jpg"
        ]);

        Service::create([
            "title" => "Dams & many other Civil Constructions",
            "description" => "A dam is a barrier that stops or restricts the flow of surface water or underground streams. Reservoirs created by dams not only suppress floods but also provide water for activities such as irrigation, human consumption, industrial use, aquaculture, and navigability. A dam can also be used to collect or store water which can be evenly distributed between locations.
            We have necessary resources and capacity for the construction of the dam. We provide many other irrigation construction works such as diversion tunnels, installation of gates & valves, and building canals with concrete lining.",
            "icon" => "service-icon5.png",
            "image" => "dam_construction.jpg"
        ]);

    }
}
