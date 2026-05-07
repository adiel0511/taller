<?php

namespace App\Controllers;

use App\Models\TallerModel;

class Taller extends BaseController
{
    public function index()
    {
        $model = new TallerModel();

        $data = array(
            'datos' => $model->findAll()
        );

        return view('taller/index', $data);
    }

    public function nuevo(): string
    {
        return view('taller/nuevo');
    }

    public function guardar()
    {
        $model = new TallerModel();

        $data = array(
            'nombre' => $this->request->getPost('nombre'),
            'ciudad' => $this->request->getPost('ciudad'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'capacidad' => $this->request->getPost('capacidad'),
            'especialidad' => $this->request->getPost('especialidad')
        );

        
        if(empty($data['nombre']) || empty($data['ciudad'])){
            return redirect()->back()->with('error', 'Campos obligatorios');
        }

        $model->insert($data);

        return redirect()->to(base_url('taller'));
    }

    public function eliminar($id)
    {
        $model = new TallerModel();
        $model->delete($id);

        return redirect()->to(base_url('taller'));
    }
}
    
