<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArsipSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'id_staf' => 1,
                'id_klien' => 1,
                'judul_arsip' => 'Gugatan Perdata',
                'jenis_perkara' => 'Perdata',
                'tanggal' => '2026-01-10',
                'file_arsip' => 'gugatan_perdata.pdf',
                'keterangan' => 'Arsip Gugatan Perdata',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_staf' => 1,
                'id_klien' => 2,
                'judul_arsip' => 'Sengketa Tanah',
                'jenis_perkara' => 'Perdata',
                'tanggal' => '2026-02-15',
                'file_arsip' => 'sengketa_tanah.pdf',
                'keterangan' => 'Dokumen Sengketa Tanah',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_staf' => 1,
                'id_klien' => 3,
                'judul_arsip' => 'Perjanjian Kerja',
                'jenis_perkara' => 'Perdata',
                'tanggal' => '2026-03-05',
                'file_arsip' => 'perjanjian_kerja.pdf',
                'keterangan' => 'Dokumen Perjanjian Kerja',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_staf' => 1,
                'id_klien' => 4,
                'judul_arsip' => 'Pidana Penipuan',
                'jenis_perkara' => 'Pidana',
                'tanggal' => '2026-04-20',
                'file_arsip' => 'pidana_penipuan.pdf',
                'keterangan' => 'Berkas Perkara Penipuan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_staf' => 1,
                'id_klien' => 5,
                'judul_arsip' => 'Wanprestasi',
                'jenis_perkara' => 'Perdata',
                'tanggal' => '2026-05-12',
                'file_arsip' => 'wanprestasi.pdf',
                'keterangan' => 'Dokumen Wanprestasi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('arsip')->insertBatch($data);
    }
}