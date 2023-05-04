<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UrlPpDansUtilisateur extends Migration
{
    public function up()
    {
        $this->forge->addColumn('utilisateurs',[
            'pp_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'avatar.jpg'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('utilisateurs','pp_url');
    }
}
