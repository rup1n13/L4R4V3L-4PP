<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Client 001',
            'email' => 'client@gmail.com',
            'adresse' => 'Adresse Client',
            'telephone' => '0123456789',
            'password' => Hash::make('password'), // Changez 'password' avec le mot de passe souhaité
            'role' => 'client',
        ]);

        Client::create([
            'user_id' => $user->id,
        ]);

    }
}