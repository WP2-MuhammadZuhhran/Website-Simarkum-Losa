<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKlienTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_klien' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'alamat' => [
                'type' => 'TEXT',
            ],

            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
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

        $this->forge->addKey('id_klien', true);

        $this->forge->createTable('klien');
    }

    public function down()
    {
        $this->forge->dropTable('klien');
    }
}
