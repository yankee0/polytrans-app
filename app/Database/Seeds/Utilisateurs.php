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


        $donnee = [
            'prenom' => 'Elhadji Gorgui',
            'nom' => 'Faye',
            'email' => 'yankee' . '@poly-trans.sn',
            'telephone' => 776998882,
            'profil' => $profils[0],
            'mot_de_passe' => sha1('./Theyankee07'),
            'compte_actif' => 'oui'
        ];


        $this->db->table('utilisateurs')->insertBatch($donnee);
    }
}
