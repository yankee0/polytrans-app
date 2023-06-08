<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;



class DropUniqueKeyMigration extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('livraisons','eir');
        $this->forge->addColumn('livraisons',[
            'eir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'NON OK'
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
