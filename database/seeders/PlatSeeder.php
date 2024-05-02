<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plat;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plat::create([
            'nom' => 'Poulet Yassa',
            'description' => 'Poulet mariné dans une sauce citronnée et épicée, accompagné de riz ou de mil.',
            'prix' => 5000,
            'admin_id' => 1, // Assurez-vous que l'admin_id correspond à un administrateur existant dans votre base de données
        ]);

        Plat::create([
            'nom' => 'Mafé',
            'description' => 'Plat sénégalais à base de viande (généralement du bœuf ou du poulet) dans une sauce aux arachides, servi avec du riz ou du couscous.',
            'prix' => 2500,
            'admin_id' => 1, // Assurez-vous que l'admin_id correspond à un administrateur existant dans votre base de données
        ]);

        Plat::create([
            'nom' => 'Couscous Royal',
            'description' => 'Plat d\'Afrique du Nord à base de semoule de blé dur, accompagné de viande (agneau, poulet, merguez), de légumes et de pois chiches.',
            'prix' => 3000,
            'admin_id' => 1, // Assurez-vous que l'admin_id correspond à un administrateur existant dans votre base de données
        ]);

        Plat::create([
            'nom' => 'Dibi',
            'description' => 'Spécialité sénégalaise, côtes d\'agneau grillées marinées dans une sauce à base d\'oignons et de moutarde, accompagnées de pain.',
            'prix' => 3700,
            'admin_id' => 1, // Assurez-vous que l'admin_id correspond à un administrateur existant dans votre base de données
        ]);
    }
}
