<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $fillable = ['id_usuario', 'id_paquete', 'id_estado'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id_paquete');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoPedido::class, 'id_estado');
    }
}