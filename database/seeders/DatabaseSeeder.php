<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Applications;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'login' => 'admin',
            'password' => 'groom',
            'role' => 'admin',
            'remember_token' => null,
        ]);
        User::factory(1)->create([
            'login' => 'user',
            'password' => '12345678',
            'role' => 'user',
            'remember_token' => null,
        ]);
        Applications::factory(10)->create();
    }
}
