<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KlienSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'nama' => 'Muhammad Rizki',
                'alamat' => 'Jl. Ahmad Yani No. 12',
                'no_hp' => '081234567801',
                'email' => 'rizki@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'nama' => 'Andi Saputra',
                'alamat' => 'Jl. Sudirman No. 25',
                'no_hp' => '081234567802',
                'email' => 'andi@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'nama' => 'Dewi Lestari',
                'alamat' => 'Jl. Diponegoro No. 8',
                'no_hp' => '081234567803',
                'email' => 'dewi@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'nama' => 'Ahmad Fauzi',
                'alamat' => 'Jl. Merdeka No. 45',
                'no_hp' => '081234567804',
                'email' => 'fauzi@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'nama' => 'Rina Kartika',
                'alamat' => 'Jl. Mawar No. 16',
                'no_hp' => '081234567805',
                'email' => 'rina@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('klien')->insertBatch($data);
    }
}