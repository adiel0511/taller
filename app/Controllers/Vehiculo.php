<?php

namespace App\Controllers;

use App\Models\VehiculoModel;
use App\Models\TallerModel;

class Vehiculo extends BaseController
{
    
    public function deku()
    {
        $model = new VehiculoModel();

        $datos = $model
            ->select('vehiculos.*, talleres.nombre as taller_nombre')
            ->join('talleres', 'talleres.id = vehiculos.taller_id', 'left')
            ->findAll();

        $data = array(
            'datos' => $datos
        );

        return view('vehiculo/index', $data);
    }

    
    public function nuevo()
    {
        $tallerModel = new TallerModel();

        $data = array(
            'datos' => $tallerModel->findAll()
        );

        return view('vehiculo/nuevo', $data);
    }

    
    public function guardar()
    {
        $model = new VehiculoModel();

        $data = array(
            'taller_id' => $this->request->getPost('taller_id'),
            'placa' => $this->request->getPost('placa'),
            'marca' => $this->request->getPost('marca'),
            'modelo' => $this->request->getPost('modelo'),
            'anio' => $this->request->getPost('anio'),
            'tipo_servicio' => $this->request->getPost('tipo_servicio')
        );

        $model->insert($data);

        return redirect()->to(base_url('vehiculo/deku'));
    }
}