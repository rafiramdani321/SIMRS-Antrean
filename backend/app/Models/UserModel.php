<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'nama_lengkap', 'role'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'username' => 'required|alpha_numeric|min_length[3]|is_unique[users.username,id,{id}]',
        'password' => 'required|min_length[8]',
        'nama_lengkap' => 'required',
        'role' => 'required|in_list[admin,petugas]'
    ];
    protected $validationMessages   = [
        'username' => [
            'required' => 'Username wajib diisi.',
            'is_unique' => 'Username ini sudah terdaftar, silahkan gunakan yang lain.',
            'alpha_numeric_space' => 'Username hanya boleh berisi huruf dan angka tanpa spasi. ',
            'min_length' => 'Username minimal 3 karakter.'
        ],
        'password' => [
            'required' => 'Password wajib diisi.',
            'min_length' => 'Password terlalu pendek, minimal 8 karakter.'
        ],
        'nama_lengkap' => [
            'required' => 'Nama lengkap wajib diisi.',
        ],
        'role' => [
            'required' => 'Role harus dipilih.',
            'in_list' => 'Role harus berupa admin atau petugas.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) return false;

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        return $data;
    }
}
