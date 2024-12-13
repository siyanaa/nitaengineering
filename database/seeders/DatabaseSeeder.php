<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AdminSeeder::class);
        $this->call(SiteSettingSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(MvcSeeder::class);
        $this->call(FaqSeeder::class);

    }
}
