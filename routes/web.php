<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal (puede ser landing page o welcome)
Route::get('/', function () {
    // Si el usuario está autenticado
    if (Auth::check()) {
        // Redirigir al home (o dashboard) - ajusta a tu gusto
        return redirect()->route('home');
    }
    // Si no está autenticado, redirigir al login
    return redirect()->route('login.form');
});

/**
 * Rutas de autenticación (AuthController)
 * Si utilizas Laravel Breeze u otro paquete, ajusta/omite estas rutas
 */
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/**
 * Rutas de productos (CRUD - Resource controller)
 * Generado con: php artisan make:controller ProductoController --resource
 */
Route::resource('productos', ProductoController::class);

/**
 * Rutas de pedidos
 */
// Lista de pedidos (para admin/empleado, por ejemplo)
Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
// Crear nuevo pedido (cliente)
Route::get('pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
// Ver detalle de un pedido
Route::get('pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
// Actualizar estado de un pedido
Route::put('pedidos/{id}/estado', [PedidoController::class, 'updateEstado'])->name('pedidos.updateEstado');

// Pedidos del usuario autenticado (cliente)
Route::get('mis-pedidos', [PedidoController::class, 'misPedidos'])->name('pedidos.misPedidos');

/**
 * Rutas de pagos
 */
Route::get('pagos', [PagoController::class, 'index'])->name('pagos.index');  // opcional
// Form para pago
Route::get('pago-form/{pedidoId}', [PagoController::class, 'pagoForm'])->name('pago.form');
// Procesar pago
Route::post('procesar-pago/{pedidoId}', [PagoController::class, 'procesarPago'])->name('pago.procesar');
// Confirmar pago (respuesta de la pasarela simulada)
Route::get('confirmar-pago/{pagoId}', [PagoController::class, 'confirmarPago'])->name('pago.confirmar');

/**
 * Rutas de entrega (para repartidor)
 */
// Asignar pedido a repartidor
Route::post('asignar-entrega/{pedidoId}', [EntregaController::class, 'asignarPedido'])->name('entrega.asignar');
// Marcar pedido como entregado
Route::post('marcar-entregado/{pedidoId}', [EntregaController::class, 'marcarEntregado'])->name('entrega.entregado');

/**
 * Rutas para Empleado (pedidos pendientes, preparar pedidos, etc.)
 */
Route::get('empleado/pedidos-pendientes', [EmpleadoController::class, 'verPedidosPendientes'])->name('empleado.pedidosPendientes');
Route::post('empleado/preparar-pedido/{id}', [EmpleadoController::class, 'prepararPedido'])->name('empleado.prepararPedido');

