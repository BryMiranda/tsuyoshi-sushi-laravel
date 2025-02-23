<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Muestra todos los pedidos (solo para roles autorizados, ej. admin/empleado)
     */
    public function index()
    {
        // Ejemplo: verificar rol
        // if (Auth::user()->role != 'admin' && Auth::user()->role != 'empleado') {
        //     abort(403, 'No autorizado');
        // }

        $pedidos = Pedido::with('detalles')->orderBy('created_at','desc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Muestra pedidos del usuario autenticado (si es cliente)
     */
    public function misPedidos()
    {
        $usuario = Auth::user();
        $pedidos = Pedido::where('user_id', $usuario->id)
            ->with('detalles.producto')
            ->orderBy('created_at','desc')
            ->get();

        return view('pedidos.misPedidos', compact('pedidos'));
    }

    /**
     * Form para crear un nuevo pedido
     */
    public function create()
    {
        $productos = Producto::all();
        return view('pedidos.create', compact('productos'));
    }

    /**
     * Guarda el nuevo pedido en BD
     */
    public function store(Request $request)
    {
        // Validamos datos básicos: dirección, productos seleccionados, etc.
        $request->validate([
            'direccion_entrega' => 'required|string',
            'productos'         => 'required|array',  // Array de IDs de producto
            'cantidades'        => 'required|array',  // Array de cantidades
        ]);

        $usuario = Auth::user();

        // Creamos el pedido
        $pedido = Pedido::create([
            'user_id'          => $usuario->id,
            'direccion_entrega'=> $request->direccion_entrega,
            'estado'           => 'pendiente',
            'total'            => 0, // lo calculamos abajo
            'fecha_pedido'     => now()
        ]);

        $total = 0;

        // Llenamos detalles
        foreach ($request->productos as $index => $productoId) {
            $producto = Producto::find($productoId);
            if ($producto) {
                $cantidad = $request->cantidades[$index] ?? 1;
                $precioUnitario = $producto->precio;
                $subTotal = $precioUnitario * $cantidad;
                $total += $subTotal;

                // Creamos el detalle
                DetallePedido::create([
                    'pedido_id'      => $pedido->id,
                    'producto_id'    => $producto->id,
                    'cantidad'       => $cantidad,
                    'precio_unitario'=> $precioUnitario
                ]);
            }
        }

        // Actualizamos total del pedido
        $pedido->update(['total' => $total]);

        // Redirigir al cliente para mostrar el pedido creado o el pago
        return redirect()->route('pedidos.show', $pedido->id)
            ->with('success','Pedido creado con éxito');
    }

    /**
     * Muestra detalles de un pedido específico
     */
    public function show($id)
    {
        $pedido = Pedido::with('detalles.producto')
            ->findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Cambia el estado de un pedido (pendiente, en_proceso, entregado, etc.)
     */
    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string'
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update([
            'estado' => $request->estado
        ]);

        return redirect()->back()->with('success','Estado del pedido actualizado.');
    }
}
