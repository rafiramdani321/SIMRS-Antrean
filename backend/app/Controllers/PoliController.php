<?php

namespace App\Controllers;

use App\Models\PoliModel;
use CodeIgniter\RESTful\ResourceController;

class PoliController extends ResourceController
{
    protected $modelName = 'App\models\PoliModel';
    protected $format = 'json';

    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond([
            'status' => 200,
            'data' => $data
        ], 200);
    }
}
