<?php

namespace App\Controllers;

use App\Models\DokterModel;
use CodeIgniter\RESTful\ResourceController;

class DokterController extends ResourceController
{
    protected $modelName = 'App\Models\DokterModel';
    protected $format = 'json';

    public function index()
    {
        $slugPoli = $this->request->getVar('poli');

        if ($slugPoli) {
            $poliModel = new \App\Models\PoliModel();
            $poli = $poliModel->where('slug', $slugPoli)->first();

            if (!$poli) {
                return $this->failNotFound('Poli tidak ditemukan');
            }

            $data = $this->model->where('id_poli', $poli['id_poli'])->findAll();
        } else {
            $data = $this->model->findAll();
        }

        return $this->respond([
            'status' => 200,
            'data' => $data
        ], 200);
    }
}
