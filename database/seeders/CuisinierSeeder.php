<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuisinier;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CuisinierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Cuisinier 001',
            'email' => 'cuisinier@gmail.com',
            'adresse' => 'Adresse Cuisinier',
            'telephone' => '0123456789',
            'password' => Hash::make('password'), // Changez 'password' avec le mot de passe souhaité
            'role' => 'cuisinier',
        ]);

        Cuisinier::create([
            'user_id' => $user->id,
        ]);

    }
}