<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'repartidor_id',
        'fecha_asignacion',
        'fecha_entrega'
    ];

    /**
     * Relación: La entrega pertenece a un pedido.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    /**
     * Relación: La entrega pertenece a un repartidor (usuario con rol repartidor).
     */
    public function repartidor()
    {
        return $this->belongsTo(User::class, 'repartidor_id');
    }
}
