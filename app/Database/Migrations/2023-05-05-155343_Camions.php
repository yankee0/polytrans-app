<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Camions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'immatriculation' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'vt_debut' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'vt_fin' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'as_debut' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'as_fin' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('immatriculation');
        $this->forge->createTable('camions',true);
    }

    public function down()
    {
        $this->forge->dropTable('camions',true);
    }
}
