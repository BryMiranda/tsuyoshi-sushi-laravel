@extends('layout.app')

@section('title', 'Pagar Pedido')

@section('content')
    <div class="bg-white p-4 shadow rounded max-w-md mx-auto">
        <h2 class="text-xl font-bold mb-4">Pagar Pedido #{{ $pedido->id }}</h2>
        <p class="mb-4">Total a Pagar: <strong>${{ $pedido->total }}</strong></p>
        <form action="{{ route('pago.procesar', $pedido->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tipo" class="block text-gray-700">Tipo de Pago</label>
                <select name="tipo" id="tipo" class="w-full border-gray-300 rounded p-2">
                    <option value="tarjeta">Tarjeta</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="monto" class="block text-gray-700">Monto</label>
                <input
                    type="number" step="0.01" name="monto"
                    value="{{ $pedido->total }}"
                    class="w-full border-gray-300 rounded p-2"
                    required
                />
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Procesar Pago
            </button>
        </form>
    </div>
@endsection
