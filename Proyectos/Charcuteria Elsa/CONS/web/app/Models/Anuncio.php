<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';
    protected $primaryKey = 'id_anuncio';
    protected $fillable = ['id_paquete', 'imagen_url', 'orden', 'visible'];

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id_paquete');
    }
}