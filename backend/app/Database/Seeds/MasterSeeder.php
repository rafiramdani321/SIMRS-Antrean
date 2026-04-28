<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $userData = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),
                'nama_lengkap' => 'Admin',
                'role' => 'admin'
            ],
            [
                'username' => 'petugas',
                'password' => password_hash('petugas123', PASSWORD_BCRYPT),
                'nama_lengkap' => 'Petugas',
                'role' => 'petugas'
            ]
        ];

        $this->db->table('users')->insertBatch($userData);

        $data = [
            'A' => [
                'poli' => 'Poli Umum',
                'dokter' => 'dr. Muhammad Rafi'
            ],
            'B' => [
                'poli' => 'Poli Gigi',
                'dokter' => 'dr. Alif Akmal'
            ]
        ];

        foreach ($data as $prefix => $detail) {
            $this->db->table('m_poli')->insert([
                'nama_poli' => $detail['poli'],
                'prefix' => $prefix
            ]);

            $poliId = $this->db->insertID();

            $this->db->table('m_dokter')->insert([
                'id_poli' => $poliId,
                'nama_dokter' => $detail['dokter']
            ]);
        }
    }
}
