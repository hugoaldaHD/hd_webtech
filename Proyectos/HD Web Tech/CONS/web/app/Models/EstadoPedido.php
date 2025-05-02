<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    protected $table = 'estados_pedido';
    protected $primaryKey = 'id_estado';
    protected $fillable = ['nombre'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_estado');
    }
}