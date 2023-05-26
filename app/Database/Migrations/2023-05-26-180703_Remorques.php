<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Remorques extends Migration
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
            'immatriculation' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'marque' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'vt_fin' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'as_fin' => [
                'type' => 'DATE',
                'null' => true,
            ],

        ]);
        $this->forge->addUniqueKey('immatriculation');
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('remorques',true);
    }

    public function down()
    {
        $this->forge->dropTable('remorques',true);
    }
}
