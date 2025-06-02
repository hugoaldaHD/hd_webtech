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

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'tipos_paquetes', 'id_tipos', 'id_paquete');
    }
}