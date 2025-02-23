@extends('layout.app')

@section('title', 'Pedidos Pendientes')

@section('content')
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-4">Pedidos Pendientes</h2>
        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Cliente</th>
                <th class="py-2 px-4">Estado</th>
                <th class="py-2 px-4">Total</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pedidos as $pedido)
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-4">{{ $pedido->id }}</td>
                    <td class="py-2 px-4">{{ $pedido->user->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $pedido->estado }}</td>
                    <td class="py-2 px-4">${{ $pedido->total }}</td>
                    <td class="py-2 px-4">
                        <!-- Botón para preparar pedido (cambia estado a "preparado" o similar) -->
                        <form action="{{ route('empleado.prepararPedido', $pedido->id) }}" method="POST">
                            @csrf
                            <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Preparar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="py-4 text-center">No hay pedidos pendientes</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
