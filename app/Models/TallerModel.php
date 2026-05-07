<?php
namespace App\Models;
use CodeIgniter\Model;

class TallerModel extends Model
{
    protected $table = 'talleres';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre',
        'ciudad',
        'ubicacion',
        'capacidad',
        'especialidad'
    ];
}