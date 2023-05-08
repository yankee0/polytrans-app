<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Livraisons extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 50; $i++) { 
            $line[$i] = [
                'conteneur' => 'RAND'.$faker->numberBetween(),
                'type' => ($i%2 == 0 ) ? 20 : 40,
                'compagnie' => $faker->company(),
                'bl' => 'RAND'.$faker->numberBetween(),
                'scan_bl' => $faker->url(),
                'do' => 'RAND'.$faker->numberBetween(),
                'scan_do' => $faker->url(),
                'deadline' => $faker->date(),
                'client' => $faker->company(),
                'contact' => $faker->name(),
                'tel_contact' => $faker->phoneNumber(),
                'email_contact' => $faker->email(),
                'paiement' => $faker->boolean(),
                'reglement' => ($i%2 == 0 ) ? 'EN ATTENTE' : 'PAYÉ',
                'date_de_paiement' => $faker->date(),
                'date_sortie' => $faker->date(),
                'date_retour' => $faker->date(),
                'zone' => $faker->city(),
                'chauffeur' => $faker->name('M'),
                'camion' => 'RAND'.$faker->numberBetween(),
                'commentaire' => $faker->text(),
            ];
        }

        $this->db->table('livraisons')->insertBatch($line);
    }
}
