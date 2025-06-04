<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    protected $fillable = ['nombre_tipo'];

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'tipos_paquete', 'id_tipo', 'id_paquete');
    }
}
