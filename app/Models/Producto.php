<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock'
    ];

    /**
     * Relación: Un producto puede estar en varios detalles de pedido.
     */
    public function detallePedidos()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
