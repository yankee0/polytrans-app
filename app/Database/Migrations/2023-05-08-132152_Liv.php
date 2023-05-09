<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Liv extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'conteneur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'type' => [
                'type' => 'ENUM("20","40")',
            ],
            'compagnie' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bl' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'scan_bl' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'do' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'scan_do' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'eir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'scan_eir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'deadline' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'client' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nom_contact' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tel_contact' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email_contact' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'paiement' => [
                'type' => 'ENUM("oui","non")',

            ],
            'reglement' => [
                'type' => 'ENUM("COMPTANT","À CRÉDIT")',

            ],
            'date_paiement' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'date_sortie' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'date_retour' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'zone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'chauffeur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'camion' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'commentaire' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'auteur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey([  
            'eir',  
            'scan_eir',
            'scan_bl',
            'scan_bo',
        ]);

        $this->forge->addForeignKey('chauffeur','chauffeurs','permis','CASCADE','NO ACTION');
        $this->forge->addForeignKey('camion','camions','immatriculation','CASCADE','NO ACTION');
        $this->forge->addForeignKey('auteur','utilisateurs','email','CASCADE','NO ACTION');

        $this->forge->createTable('livraisons',true);
    }

    public function down()
    {
        $this->forge->dropTable('livraisons',true);
    }
}
