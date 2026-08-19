<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StafSeeder extends Seeder
{
    public function run()
    {
        $data = [

            'id_pimpinan' => 1,

            'nama' => 'Staf Administrasi',

            'username' => 'staf',

            'password' => password_hash('staf123', PASSWORD_DEFAULT),

            'email' => 'staf@simarkum.com',

            'no_hp' => '081234567891',

            'created_at' => date('Y-m-d H:i:s'),

            'updated_at' => date('Y-m-d H:i:s'),

        ];

        $this->db->table('staf')->insert($data);
    }
}