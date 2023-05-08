<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Livraisons extends Migration
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
                'constraint' => 255,
                'null' => true,
            ],
            'compagnie' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bl' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                // 'null' => true,
            ],
            'scan_bl' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                // 'null' => true,
            ],
            'do' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                // 'null' => true,
            ],
            'scan_do' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                // 'null' => true,
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
            'contact' => [
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
                'type' => 'ENUM("PAYÉ","EN ATTENTE")',
                'constraint' => 255,
                'null' => true,
            ],
            'reglement' => [
                'type' => 'ENUM("COMPTANT","À CRÉDIT")',
                'constraint' => 255,
                'null' => true,
            ],
            'date_de_paiement' => [
                'type' => 'DATE',
                'constraint' => 255,
                'null' => true,
            ],
            'date_sortie' => [
                'type' => 'DATETIME',
                'constraint' => 255,
                'null' => true,
            ],
            'date_retour' => [
                'type' => 'DATETIME',
                'constraint' => 255,
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
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey([
            'bl',
            'bo',
            'scan_bl',
            'scan_bo',
        ]);

        $this->forge->addForeignKey('chauffeur','chauffeurs','permis','CASCADE','NO ACTION');
        $this->forge->addForeignKey('camion','camions','immatriculation','CASCADE','NO ACTION');

        $this->forge->createTable('livraisons',true);
    }

    public function down()
    {
        $this->forge->dropTable('livraisons',true);
    }
}
