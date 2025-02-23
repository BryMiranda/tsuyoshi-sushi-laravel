@extends('layout.app')

@section('title', 'Detalle Pedido')

@section('content')
    <div class="bg-white p-4 shadow rounded max-w-lg mx-auto">
        <h2 class="text-xl font-bold mb-2">Pedido #{{ $pedido->id }}</h2>
        <p><strong>Cliente:</strong> {{ $pedido->user->name ?? 'N/A' }}</p>
        <p><strong>Estado:</strong> {{ $pedido->estado }}</p>
        <p><strong>Total:</strong> ${{ $pedido->total }}</p>
        <p><strong>Fecha:</strong> {{ $pedido->fecha_pedido }}</p>
        <p><strong>Dirección:</strong> {{ $pedido->direccion_entrega }}</p>

        <h3 class="font-semibold mt-4 mb-2">Detalles:</h3>
        <ul class="list-disc list-inside">
            @foreach($pedido->detalles as $detalle)
                <li>
                    {{ $detalle->producto->nombre ?? 'Producto Eliminado' }}
                    x {{ $detalle->cantidad }}
                    = ${{ $detalle->precio_unitario * $detalle->cantidad }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
