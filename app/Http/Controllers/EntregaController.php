<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class EntregaController extends Controller
{
    /**
     * Asigna un pedido a un repartidor (puede hacerlo un empleado/admin)
     */
    public function asignarPedido(Request $request, $pedidoId)
    {
        $request->validate([
            'repartidor_id' => 'required|integer'
        ]);

        $pedido = Pedido::findOrFail($pedidoId);

        // Creamos o actualizamos la Entrega
        // (puedes tener una relación 1:1 o 1:N con pedidos)
        $entrega = Entrega::create([
            'pedido_id'     => $pedido->id,
            'repartidor_id' => $request->repartidor_id,
            'fecha_asignacion' => now()
        ]);

        // Opcional: cambiar estado del pedido a "en_camino" o similar
        $pedido->update(['estado' => 'en_camino']);

        return redirect()->back()->with('success','Pedido asignado al repartidor.');
    }

    /**
     * El repartidor marca el pedido como entregado
     */
    public function marcarEntregado($pedidoId)
    {
        $pedido = Pedido::findOrFail($pedidoId);

        // Busca el registro de Entrega correspondiente
        $entrega = Entrega::where('pedido_id', $pedido->id)->first();

        if ($entrega) {
            $entrega->update([
                'fecha_entrega' => now()
            ]);
        }

        // Actualizamos el estado del pedido
        $pedido->update(['estado' => 'entregado']);

        return redirect()->back()->with('success','Pedido marcado como entregado.');
    }
}
