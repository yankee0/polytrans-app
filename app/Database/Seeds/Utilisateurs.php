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
            'OPS FLOTTE'
        ];


        $donnee = [
            [

                'prenom' => 'Elhadji Gorgui',
                'nom' => 'Faye',
                'email' => 'yankee' . '@poly-trans.sn',
                'telephone' => 776998882,
                'profil' => $profils[0],
                'mot_de_passe' => sha1('yankee'),
                'compte_actif' => 'oui'
            ],
            [
                'prenom' => 'Elhadji Gorgui',
                'nom' => 'Faye',
                'email' => 'flotte@poly-trans.sn',
                'telephone' => $faker->phoneNumber(),
                'profil' => $profils[1],
                'mot_de_passe' => sha1('yankee'),
                'compte_actif' => 'oui'
            ],
        ];



        $this->db->table('utilisateurs')->insertBatch($donnee);
    }
}
