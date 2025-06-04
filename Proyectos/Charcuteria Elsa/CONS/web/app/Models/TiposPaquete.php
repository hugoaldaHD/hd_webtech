<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposPaquete extends Model
{
    protected $table = 'tipos_paquete';
    protected $primaryKey = 'id_tipos_paquete';
    public $timestamps = true;

    protected $fillable = [
        'id_tipos',
        'id_paquete',
    ];

    // Relación inversa con Tipos (padre)
    public function tipo()
    {
        return $this->belongsTo(Tipos::class, 'id_tipos', 'id_tipos');
    }
}