<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Utilisateur extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'profil' => [
                'type' => 'ENUM("SUPER ADMIN","OPS FLOTTE","OPS RECEPTION","OPS MVT","OPS FINANCE","OPS TRANSPORT")',
            ],
            'mot_de_passe' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'pp_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'avatar.jpg'
            ],
            'compte_actif' => [
                'type' => 'ENUM("oui","non")',
                'default' => 'non',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey([
            'email',
            'telephone'
        ]);
        $this->forge->createTable('utilisateurs');
    }

    public function down()
    {
        $this->forge->dropTable('utilisateurs');
    }
}
