<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Producto;
use Carbon\Carbon;

class PedidoSeeder extends Seeder
{
    public function run()
    {
        // Asumimos que existe al menos un usuario con rol 'cliente'
        // Por ejemplo, en el UserSeeder creamos un usuario con id=2
        $clienteId = 2; // Ajusta según tus seeders de usuarios

        // Verificar que existan productos
        $productos = Producto::all();
        if ($productos->isEmpty()) {
            $this->command->info('No hay productos para asignar al pedido. Ejecuta el ProductoSeeder primero.');
            return;
        }

        // Crear un pedido
        $pedido = Pedido::create([
            'user_id'           => $clienteId,
            'direccion_entrega' => 'Calle Falsa 123, Ciudad, País',
            'estado'            => 'pendiente',
            'total'             => 0, // Se actualizará al calcular los detalles
            'fecha_pedido'      => Carbon::now(),
        ]);

        $total = 0;

        // Seleccionamos 2 productos aleatorios para el pedido
        $productosSeleccionados = $productos->random(2);

        foreach ($productosSeleccionados as $producto) {
            $cantidad = rand(1, 3);
            $subTotal = $producto->precio * $cantidad;
            $total += $subTotal;

            // Crear el detalle del pedido
            DetallePedido::create([
                'pedido_id'      => $pedido->id,
                'producto_id'    => $producto->id,
                'cantidad'       => $cantidad,
                'precio_unitario'=> $producto->precio,
            ]);
        }

        // Actualizar el total del pedido
        $pedido->update(['total' => $total]);
    }
}
