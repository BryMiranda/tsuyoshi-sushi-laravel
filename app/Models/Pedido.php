<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'estado',
        'direccion_entrega',
        'total',
        'fecha_pedido'
    ];

    /**
     * Relación: Un pedido pertenece a un usuario (cliente).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: Un pedido tiene muchos detalles (productos pedidos).
     */
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }

    /**
     * Relación: Un pedido puede tener varios registros de pago.
     */
    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    /**
     * Relación: Un pedido tiene una asignación de entrega.
     */
    public function entrega()
    {
        return $this->hasOne(Entrega::class);
    }
}
