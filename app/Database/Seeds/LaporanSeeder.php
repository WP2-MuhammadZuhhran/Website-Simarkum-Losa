<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'id_arsip' => 1,
                'periode' => 'Januari 2026',
                'tanggal_laporan' => '2026-01-31',
                'jenis_laporan' => 'Bulanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_arsip' => 2,
                'periode' => 'Februari 2026',
                'tanggal_laporan' => '2026-02-28',
                'jenis_laporan' => 'Bulanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_arsip' => 3,
                'periode' => 'Maret 2026',
                'tanggal_laporan' => '2026-03-31',
                'jenis_laporan' => 'Bulanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_arsip' => 4,
                'periode' => 'April 2026',
                'tanggal_laporan' => '2026-04-30',
                'jenis_laporan' => 'Bulanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id_arsip' => 5,
                'periode' => 'Mei 2026',
                'tanggal_laporan' => '2026-05-31',
                'jenis_laporan' => 'Bulanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('laporan')->insertBatch($data);
    }
}