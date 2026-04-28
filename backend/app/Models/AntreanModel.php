<?php

namespace App\Models;

use CodeIgniter\Model;

class AntreanModel extends Model
{
    protected $table            = 't_antrean';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_poli', 'id_dokter', 'nama_pasien', 'nomor_antrean', 'status'];

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
        'id_poli' => 'required',
        'id_dokter' => 'required',
        'nama_pasien' => 'required',
        'nomor_antrean' => 'required',
        'status' => 'required'
    ];
    protected $validationMessages   = [
        'id_poli' => ['required' => 'Poli wajib diisi.'],
        'id_dokter' => ['required' => 'Dokter wajib diisi.'],
        'nama_pasien' => ['required' => 'Nama pasien wajib diisi.'],
        'nomor_antrean' => [
            'required' => 'Nomor antrean wajib diisi.',
        ],
        'status' => ['required' => 'Status wajib diisi.']
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
