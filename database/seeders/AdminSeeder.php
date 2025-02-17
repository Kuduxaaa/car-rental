<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@example.com')->first();

        if (!$user) 
        {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => ('password'),
                'role' => 2
            ]);
        }
    }
}
