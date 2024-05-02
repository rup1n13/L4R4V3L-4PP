<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ServeurSeeder::class,
            CuisinierSeeder::class,
            ClientSeeder::class,
            AdminSeeder::class,
            StatutSeeder::class,
            PlatSeeder::class,
        ]);
    }
}
