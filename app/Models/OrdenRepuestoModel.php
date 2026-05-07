<?php
namespace App\Models;
use CodeIgniter\Model;

class OrdenRepuestoModel extends Model
{
    protected $table            = 'orden_repuestos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'orden_id',
        'repuesto_id',
        'cantidad',
        'subtotal',  // ← FALTABA - por esto no calculaba totales
    ];
}
