<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Statut;
class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statut::create([
            'titre' => 'En attente',
            'color' => '#FFA500', // Orange
        ]);

        Statut::create([
            'titre' => 'Terminé',
            'color' => '#008000', // Green
        ]);

        Statut::create([
            'titre' => 'En cours',
            'color' => '#FFD700', // Gold
        ]);

   }
}