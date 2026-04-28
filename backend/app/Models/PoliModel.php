<?php

namespace App\Models;

use CodeIgniter\Model;

class PoliModel extends Model
{
    protected $table            = 'm_poli';
    protected $primaryKey       = 'id_poli';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_poli', 'slug', 'prefix'];

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
        'nama_poli' => 'required|is_unique[m_poli.nama_poli,id_poli,{id_poli}]',
        'slug'      => 'required|alpha_dash|is_unique[m_poli.slug,id_poli,{id_poli}]',
        'prefix' => 'required|is_unique[m_poli.prefix,id_poli,{id_poli}]'
    ];
    protected $validationMessages   = [
        'nama_poli' => [
            'required' => 'Nama poli wajib diisi.',
            'is_unique' => 'Nama poli sudah terdaftar.'
        ],
        'slug' => [
            'required' => 'Slug wajib diisi.',
            'is_unique' => 'Slug sudah terdaftar.'
        ],
        'prefix' => [
            'required' => 'Prefix wajib diisi.',
            'is_unique' => 'Prefix sudah terdaftar'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
