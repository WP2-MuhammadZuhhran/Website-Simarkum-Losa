<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaporanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_laporan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'id_arsip' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'tanggal_laporan' => [
                'type' => 'DATE',
            ],

            'jenis_laporan' => [
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

        $this->forge->addKey('id_laporan', true);

        $this->forge->addForeignKey(
            'id_arsip',
            'arsip',
            'id_arsip',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('laporan');
    }

    public function down()
    {
        $this->forge->dropTable('laporan');
    }
}