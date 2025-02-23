@extends('layout.app')

@section('title', 'Mis Pedidos')

@section('content')
    <div class="bg-white p-4 shadow rounded">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Mis Pedidos</h2>
            <a href="{{ route('pedidos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Agregar Pedido
            </a>
        </div>
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
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-4 text-center">No has realizado pedidos</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
