<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePaquete extends Model
{
    protected $table = 'detalles_paquete';
    protected $primaryKey = 'id_detalle';
    protected $fillable = ['id_paquete', 'texto'];

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id_paquete');
    }
}