<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    /**
     * Muestra la lista de pedidos pendientes
     */
    public function verPedidosPendientes()
    {
        // Solo un usuario con rol "empleado"
        if (Auth::user()->role !== 'empleado') {
            abort(403, 'No tienes permiso para esta acción');
        }

        $pedidos = Pedido::where('estado', 'pendiente')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Marca un pedido como preparado (listo para el repartidor)
     */
    public function prepararPedido($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update(['estado' => 'en_proceso']);

        return redirect()->back()->with('success','Pedido marcado como preparado.');
    }
}
