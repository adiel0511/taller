<?php
namespace App\Models;
use CodeIgniter\Model;

class VehiculoModel extends Model
{
   protected $table = 'vehiculos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'taller_id',
        'placa',
        'marca',
        'modelo',
        'anio',
        'tipo_servicio'
    ];
}