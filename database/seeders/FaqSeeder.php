<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Faq::create([
            'title' => 'What kinds of building projects does your business specialize in?',
            'description' => 'We specialize in a range of construction projects, including institutional, commercial, and residential buildings.',
        ]);
        Faq::create([
            'title' => 'How do you handle alterations to the project timeframe or scope?',
            'description' => 'To make sure that any alterations to the project scope or timetable are discussed and accepted before moving forward, we work closely with our clients. Also, we have backup measures in place to lessen any effects on the project budget and timeline.',
        ]);
        Faq::create([
            'title' => 'What safety procedures are in place to guarantee the security of your employees and the project site?',
            'description' => ' We have a thorough safety policy in place that includes frequent training on safety for our employees, the usage of personal protective equipment, and regular site inspections to find and remedy any possible dangers.',
        ]);
        Faq::create([
            'title' => 'How do you manage client communication during the project?',
            'description' => 'A professional project manager who acts as the client primary point of contact is assigned to each project by our company. We also offer frequent progress updates and are accessible to resolve any questions or issues that might come up.',
        ]);
        Faq::create([
            'title' => 'How do you make sure the project is finished on schedule and on budget?',
            'description' => 'To keep a project on track, we meticulously plan and schedule each one, regularly monitor progress, and make adjustments as necessary. In order to stay on budget, we continuously track costs throughout the project and collaborate with our clients to develop realistic budgets.',
        ]);
       
    }
}
