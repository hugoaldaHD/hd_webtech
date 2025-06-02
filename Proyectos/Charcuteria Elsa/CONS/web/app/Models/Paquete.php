<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes';
    protected $primaryKey = 'id_paquete';
    protected $fillable = ['titulo', 'descripcion', 'precio'];

    public function detalles()
    {
        return $this->hasMany(DetallePaquete::class, 'id_paquete');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_paquete');
    }

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class, 'id_paquete');
    }
}