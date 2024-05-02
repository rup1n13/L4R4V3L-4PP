<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Serveur;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ServeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Serveur 001',
            'email' => 'serveur@gmail.com',
            'adresse' => 'Adresse Serveur',
            'telephone' => '0123456789',
            'password' => Hash::make('password'), // Changez 'password' avec le mot de passe souhaité
            'role' => 'serveur',
        ]);

        Serveur::create([
            'user_id' => $user->id,
        ]);

    }
}