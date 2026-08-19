<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PimpinanSeeder extends Seeder
{
    public function run()
    {
        $data = [

    'nama' => 'Andi Fatmawati, S.H.',

    'username' => 'andi',

    'password' => password_hash('admin123', PASSWORD_DEFAULT),

    'email' => 'admin@simarkum.com',

    'no_hp' => '081234567890',

    'created_at' => date('Y-m-d H:i:s'),

    'updated_at' => date('Y-m-d H:i:s'),

];

        $this->db->table('pimpinan')->insert($data);
    }
}
