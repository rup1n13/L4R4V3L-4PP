<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin 001',
            'email' => 'admin@gmail.com',
            'adresse' => 'Adresse admin',
            'telephone' => '0123456789',
            'password' => Hash::make('password'), // Changez 'password' avec le mot de passe souhaité
            'role' => 'admin',
        ]);

        Admin::create([
            'user_id' => $user->id,
        ]);

    }
}