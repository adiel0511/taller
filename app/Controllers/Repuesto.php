<?php

namespace App\Controllers;

use App\Models\RepuestoModel;

class Repuesto extends BaseController
{
    public function index()
    {
        $model = new RepuestoModel();

        $data = array(
            'datos' => $model->findAll()
        );

        return view('repuesto/index', $data);
    }

    public function nuevo()
    {
        return view('repuesto/nuevo');
    }

    public function guardar()
    {
        $model = new RepuestoModel();

        $data = array(
            'nombre' => $this->request->getPost('nombre'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock')
        );

        $model->insert($data);

        return redirect()->to(base_url('repuesto'));
    }

    public function eliminar($id)
    {
        $model = new RepuestoModel();
        $model->delete($id);

        return redirect()->to(base_url('repuesto'));
    }
}