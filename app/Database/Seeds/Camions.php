<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class Camions extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 30; $i++) { 
            $donnee[$i] = [
                'immatriculation' => 'PLT'.$faker->randomNumber(),
                'vt_debut' => $faker->date(),
                'vt_fin' => $faker->date(),
                'as_debut' => $faker->date(),
                'as_fin' => $faker->date(),
            ];
        }

        $this->db->table('camions')->insertBatch($donnee);
    }
}
