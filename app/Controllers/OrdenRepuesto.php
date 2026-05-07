<?php

namespace App\Controllers;
use App\Models\OrdenRepuestoModel;

class OrdenRepuesto extends BaseController
{
    public function guardar()
    {
        $model = new OrdenRepuestoModel();

        $data = array(
            'orden_id' => $this->request->getPost('orden_id'),
            'repuesto_id' => $this->request->getPost('repuesto_id'),
            'cantidad' => $this->request->getPost('cantidad')
        );

        $model->insert($data);

        return redirect()->to('orden');
    }
}