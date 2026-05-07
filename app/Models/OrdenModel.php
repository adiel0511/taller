<?php
namespace App\Models;
use CodeIgniter\Model;

class OrdenModel extends Model
{
    protected $table            = 'ordenes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'vehiculo_id',
        'diagnostico',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'total',         // ← faltaba este campo
    ];
}
