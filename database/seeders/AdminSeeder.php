<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "NitaAdmin",
            'email' => 'nitaadmin@gmail.com',
            'password' => '$2a$12$rMfbcf2MJrrnzm2JIimPf.1bJaCXLMnN69JwCuqZ1iJ0/IWb.XUO6' //password
        ]);
    }
}
