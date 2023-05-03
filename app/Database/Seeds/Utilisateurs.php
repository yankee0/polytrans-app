<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Utilisateurs extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $profils = [
            'SUPER ADMIN',
        ];

        for ($i=0; $i < sizeof($profils); $i++) { 
            $donnee[$i] = [
                'prenom' => $faker->firstName(),
                'nom' => $faker->lastName(),
                'email' => $faker->firstName().'@poly-trans.sn',
                'telephone' => $faker->phoneNumber(),
                'profil' => $profils[$i],
                'mot_de_passe' => sha1('yankee'),
            ];
        }

        $this->db->table('utilisateurs')->insertBatch($donnee);
        
    }
}
