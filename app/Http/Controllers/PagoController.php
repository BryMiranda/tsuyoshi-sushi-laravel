<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Pago;

class PagoController extends Controller
{
    /**
     * (Opcional) Muestra lista de pagos
     */
    public function index()
    {
        $pagos = Pago::with('pedido')->get();
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Formulario de pago para un pedido en particular
     */
    public function pagoForm($pedidoId)
    {
        $pedido = Pedido::findOrFail($pedidoId);
        return view('pagos.form', compact('pedido'));
    }

    /**
     * Procesa pago (tarjeta, PayPal, etc. - simulación)
     */
    public function procesarPago(Request $request, $pedidoId)
    {
        $request->validate([
            'tipo'  => 'required|string', // "tarjeta", "efectivo", etc.
            'monto' => 'required|numeric|min:0'
        ]);

        $pedido = Pedido::findOrFail($pedidoId);

        // Lógica para llamar a la pasarela de pago o simular
        // Por simplicidad, simulamos un pago exitoso.

        $pago = Pago::create([
            'pedido_id'   => $pedido->id,
            'monto'       => $request->monto,
            'tipo'        => $request->tipo,
            'estado'      => 'pendiente',
            'fecha_pago'  => now()
        ]);

        // Supongamos que la pasarela responde "éxito"
        return redirect()->route('pago.confirmar', $pago->id);
    }

    /**
     * Confirma el pago (actualiza estado a "pagado")
     */
    public function confirmarPago($pagoId)
    {
        $pago = Pago::findOrFail($pagoId);
        $pago->update([
            'estado' => 'pagado'
        ]);

        // Actualizar estado del pedido si lo deseas
        $pago->pedido->update(['estado' => 'pagado']);

        return redirect()->route('pedidos.show', $pago->pedido_id)
            ->with('success','Pago confirmado exitosamente.');
    }
}
