@extends('layout.app')

@section('title', 'Pagos')

@section('content')
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-4">Pagos Registrados</h2>
        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Pedido</th>
                <th class="py-2 px-4">Tipo</th>
                <th class="py-2 px-4">Monto</th>
                <th class="py-2 px-4">Estado</th>
                <th class="py-2 px-4">Fecha Pago</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pagos as $pago)
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-4">{{ $pago->id }}</td>
                    <td class="py-2 px-4">#{{ $pago->pedido_id }}</td>
                    <td class="py-2 px-4">{{ $pago->tipo }}</td>
                    <td class="py-2 px-4">${{ $pago->monto }}</td>
                    <td class="py-2 px-4">{{ $pago->estado }}</td>
                    <td class="py-2 px-4">{{ $pago->fecha_pago }}</td>
                </tr>
            @empty
                <tr><td colspan="6" class="py-4 text-center">No hay pagos registrados</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
