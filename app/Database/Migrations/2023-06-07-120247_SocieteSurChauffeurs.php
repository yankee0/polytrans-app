<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SocieteSurChauffeurs extends Migration
{
    public function up()
    {
        $this->forge->addColumn('chauffeurs',[
            'societe' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('chauffeurs','societe');
    }
}
