<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAmend extends Migration
{
    public function up()
    {
        $this->forge->addColumn('livraisons',[
            'amendement' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'default' => 'non'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('livraisons','amendement');
    }
}
