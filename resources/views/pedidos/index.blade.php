@extends('layout.app')

@section('title', 'Lista de Pedidos')

@section('content')
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-4">Pedidos (Todos)</h2>
        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Cliente</th>
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
                    <td class="py-2 px-4">{{ $pedido->user->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $pedido->estado }}</td>
                    <td class="py-2 px-4">${{ $pedido->total }}</td>
                    <td class="py-2 px-4">{{ $pedido->fecha_pedido }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="text-blue-500 hover:text-blue-600 mr-2">
                            Ver
                        </a>
                        @if($pedido->estado === 'en_proceso')
                            <!-- CTA: Finalizar y enviar pedido -->
                            <form action="{{ route('pedidos.updateEstado', $pedido->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="estado" value="en_camino">
                                <button class="text-sm bg-green-500 px-2 py-1 rounded hover:bg-green-600"
                                        onclick="return confirm('¿Finalizar y enviar pedido?')">
                                    Finalizar y enviar pedido
                                </button>
                            </form>
                        @endif
                        @if($pedido->estado === 'pendiente')
                            <!-- CTA: Procesar (cambia estado a en_proceso) -->
                            <form action="{{ route('pedidos.updateEstado', $pedido->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="estado" value="en_proceso">
                                <button class="text-sm bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500"
                                        onclick="return confirm('¿Cambiar estado a en_proceso?')">
                                    Procesar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-4 text-center">No hay pedidos</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
