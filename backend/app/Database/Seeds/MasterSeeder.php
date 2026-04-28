<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('m_dokter')->emptyTable();
        $this->db->table('m_poli')->emptyTable();
        $this->db->table('users')->emptyTable();

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
            [
                'poli' => 'Poli Umum',
                'prefix' => 'A',
                'dokter' => ['dr. Muhammad Rafi', 'dr. Calvin CS']
            ],
            [
                'poli' => 'Poli Gigi',
                'prefix' => 'B',
                'dokter' => ['dr. Alif Akmal']
            ]
        ];

        helper('text');

        foreach ($data as $item) {
            $this->db->table('m_poli')->insert([
                'nama_poli' => $item['poli'],
                'slug' => url_title($item['poli'], '-', true),
                'prefix' => $item['prefix']
            ]);

            $poliId = $this->db->insertID('m_poli', 'id_poli');

            foreach ($item['dokter'] as $namaDokter) {
                $this->db->table('m_dokter')->insert([
                    'id_poli' => $poliId,
                    'nama_dokter' => $namaDokter
                ]);
            }
        }
    }
}
