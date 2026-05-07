<?php
namespace App\Controllers;

use App\Models\TallerModel;
use App\Models\VehiculoModel;
use App\Models\OrdenModel;
use App\Models\RepuestoModel;

class Home extends BaseController
{
    public function index()
    {
        $stats = [
            'talleres'  => (new TallerModel())->countAllResults(),
            'vehiculos' => (new VehiculoModel())->countAllResults(),
            'ordenes'   => (new OrdenModel())->countAllResults(),
            'repuestos' => (new RepuestoModel())->countAllResults(),
        ];

        $ultimas_ordenes = (new OrdenModel())
            ->select('ordenes.*, vehiculos.placa')
            ->join('vehiculos', 'vehiculos.id = ordenes.vehiculo_id', 'left')
            ->orderBy('ordenes.id', 'DESC')
            ->limit(5)
            ->findAll();

        return view('home', [
            'stats'          => $stats,
            'ultimas_ordenes'=> $ultimas_ordenes,
        ]);
    }
}
