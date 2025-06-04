<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipos';
    public $timestamps = true;

    protected $fillable = [
        'nombre_tipos',
    ];

    // Relación con la tabla intermedia
    public function tiposPaquetes()
    {
        return $this->hasMany(TiposPaquete::class, 'id_tipos', 'id_tipos');
    }
}