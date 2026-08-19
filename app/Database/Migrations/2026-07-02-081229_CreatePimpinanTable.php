<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePimpinanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_pimpinan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],

            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);

        $this->forge->addKey('id_pimpinan', true);

        $this->forge->createTable('pimpinan');
    }

    public function down()
    {
        $this->forge->dropTable('pimpinan');
    }
}