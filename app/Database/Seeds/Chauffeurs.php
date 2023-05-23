<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class Chauffeurs extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 30; $i++) { 
            $donnee[$i] = [
                'prenom' => $faker->firstName(),
                'nom' => $faker->lastName(),
                'tel' => $faker->phoneNumber()
            ];
        }

        $this->db->table('chauffeurs')->insertBatch($donnee);
    }
}
