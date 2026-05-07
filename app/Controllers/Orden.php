<?php
namespace App\Controllers;

use App\Models\OrdenModel;
use App\Models\VehiculoModel;
use App\Models\RepuestoModel;
use App\Models\OrdenRepuestoModel;

class Orden extends BaseController
{
    public function index()
    {
        $model = new OrdenModel();
        $datos = $model
            ->select('ordenes.*, vehiculos.placa')
            ->join('vehiculos', 'vehiculos.id = ordenes.vehiculo_id', 'left')
            ->orderBy('ordenes.id', 'DESC')
            ->findAll();

        return view('orden/index', ['datos' => $datos]);
    }

    public function nuevo()
    {
        $vehiculoModel = new VehiculoModel();
        $repuestoModel = new RepuestoModel();

        return view('orden/nuevo', [
            'vehiculos' => $vehiculoModel->findAll(),
            'repuestos' => $repuestoModel->findAll()
        ]);
    }

    public function guardar()
    {
        $ordenModel    = new OrdenModel();
        $orModel       = new OrdenRepuestoModel();
        $repuestoModel = new RepuestoModel();

        $ordenData = [
            'vehiculo_id'  => $this->request->getPost('vehiculo_id'),
            'diagnostico'  => $this->request->getPost('diagnostico'),
            'estado'       => $this->request->getPost('estado'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin'    => $this->request->getPost('fecha_fin'),
            'total'        => 0
        ];

        $ordenModel->insert($ordenData);
        $orden_id = $ordenModel->insertID();

        $repuestos  = $this->request->getPost('repuesto_id');
        $cantidades = $this->request->getPost('cantidad');
        $total      = 0;

        if (!empty($repuestos)) {
            for ($i = 0; $i < count($repuestos); $i++) {
                if (!empty($repuestos[$i]) && $cantidades[$i] > 0) {
                    $rep      = $repuestoModel->find($repuestos[$i]);
                    $subtotal = $rep['precio'] * $cantidades[$i];
                    $total   += $subtotal;

                    $orModel->insert([
                        'orden_id'    => $orden_id,
                        'repuesto_id' => $repuestos[$i],
                        'cantidad'    => $cantidades[$i],
                        'subtotal'    => $subtotal
                    ]);
                }
            }
        }

        $ordenModel->update($orden_id, ['total' => $total]);
        return redirect()->to(base_url('orden'));
    }

    public function ver($id)
    {
        $ordenModel    = new OrdenModel();
        $repuestoModel = new RepuestoModel();
        $orModel       = new OrdenRepuestoModel();

        $orden = $ordenModel
            ->select('ordenes.*, vehiculos.placa')
            ->join('vehiculos', 'vehiculos.id = ordenes.vehiculo_id', 'left')
            ->find($id);

        if (!$orden) {
            return redirect()->to(base_url('orden'))->with('error', 'Orden no encontrada');
        }

        $repuestos_orden = $orModel
            ->select('orden_repuestos.*, repuestos.nombre as repuesto_nombre, repuestos.precio as precio_unit')
            ->join('repuestos', 'repuestos.id = orden_repuestos.repuesto_id', 'left')
            ->where('orden_id', $id)
            ->findAll();

        return view('orden/detalle', [
            'orden'           => $orden,
            'catalogo'        => $repuestoModel->findAll(),
            'repuestos_orden' => $repuestos_orden,
        ]);
    }

    public function guardar_repuestos()
    {
        $orModel       = new OrdenRepuestoModel();
        $ordenModel    = new OrdenModel();
        $repuestoModel = new RepuestoModel();

        $orden_id   = $this->request->getPost('orden_id');
        $repuestos  = $this->request->getPost('repuesto_id');
        $cantidades = $this->request->getPost('cantidad');

        if (!empty($repuestos)) {
            foreach ($repuestos as $i => $id_rep) {
                if ($id_rep != '' && $cantidades[$i] > 0) {
                    $rep      = $repuestoModel->find($id_rep);
                    $subtotal = $rep['precio'] * $cantidades[$i];
                    $orModel->insert([
                        'orden_id'    => $orden_id,
                        'repuesto_id' => $id_rep,
                        'cantidad'    => $cantidades[$i],
                        'subtotal'    => $subtotal
                    ]);
                }
            }
        }

        $suma       = $orModel->where('orden_id', $orden_id)->selectSum('subtotal')->get()->getRow();
        $nuevoTotal = $suma->subtotal ?? 0;
        $ordenModel->update($orden_id, ['total' => $nuevoTotal]);
        return redirect()->to(base_url('orden/ver/' . $orden_id));
    }

    public function eliminar($id)
    {
        (new OrdenModel())->delete($id);
        return redirect()->to(base_url('orden'));
    }
}
