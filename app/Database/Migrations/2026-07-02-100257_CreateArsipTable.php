<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArsipTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_arsip' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'id_staf' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'id_klien' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'judul_arsip' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],

            'jenis_perkara' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'tanggal' => [
                'type' => 'DATE',
            ],

            'file_arsip' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
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

        $this->forge->addKey('id_arsip', true);

        $this->forge->addForeignKey(
            'id_staf',
            'staf',
            'id_staf',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'id_klien',
            'klien',
            'id_klien',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('arsip');
    }

    public function down()
    {
        $this->forge->dropTable('arsip');
    }
}