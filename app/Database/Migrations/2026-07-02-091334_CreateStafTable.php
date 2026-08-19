<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStafTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_staf' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'id_pimpinan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
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

        $this->forge->addKey('id_staf', true);

        $this->forge->addForeignKey(
            'id_pimpinan',
            'pimpinan',
            'id_pimpinan',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('staf');
    }

    public function down()
    {
        $this->forge->dropTable('staf');
    }
}