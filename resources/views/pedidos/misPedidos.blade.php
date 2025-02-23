@extends('layout.app')

@section('title', 'Mis Pedidos')

@section('content')
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-4">Mis Pedidos</h2>
        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Estado</th>
                <th class="py-2 px-4">Total</th>
                <th class="py-2 px-4">Fecha</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pedidos as $pedido)
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-4">{{ $pedido->id }}</td>
                    <td class="py-2 px-4">{{ $pedido->estado }}</td>
                    <td class="py-2 px-4">${{ $pedido->total }}</td>
                    <td class="py-2 px-4">{{ $pedido->fecha_pedido }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="text-blue-500 hover:text-blue-600">
                            Ver
                        </a>
                        {{-- Ejemplo de link para pago --}}
                        @if($pedido->estado === 'pendiente')
                            <a href="{{ route('pago.form', $pedido->id) }}" class="ml-4 text-green-500 hover:text-green-600">
                                Pagar
                            </a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="py-4 text-center">No has realizado pedidos</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
