<?php
namespace App\Models;
use CodeIgniter\Model;

class RepuestoModel extends Model
{
    protected $table            = 'repuestos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nombre',
        'precio',
        'stock',   // ← FALTABA - por esto no guardaba repuestos
    ];
}
