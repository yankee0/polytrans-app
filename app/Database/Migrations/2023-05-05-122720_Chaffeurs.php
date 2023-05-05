<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chaffeurs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'permis' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'prenom' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('permis');
        $this->forge->createTable('chauffeurs',true);
    }

    public function down()
    {
        $this->forge->dropTable('permis',true);
    }
}