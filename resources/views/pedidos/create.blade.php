@extends('layout.app')

@section('title', 'Nuevo Pedido')

@section('content')
    <div class="bg-white p-4 shadow rounded max-w-lg mx-auto">
        <h2 class="text-xl font-bold mb-4">Crear Pedido</h2>
        <form action="{{ route('pedidos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Dirección de Entrega</label>
                <input
                    type="text" name="direccion_entrega"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('direccion_entrega') }}"
                    required
                />
            </div>

            <!-- Lista de productos -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Selecciona Productos</label>
                @foreach($productos as $producto)
                    <div class="flex items-center mb-2">
                        <input
                            type="checkbox" name="productos[]" value="{{ $producto->id }}"
                            class="mr-2"
                            id="prod-{{ $producto->id }}"
                        >
                        <label for="prod-{{ $producto->id }}" class="text-gray-700 mr-2">
                            {{ $producto->nombre }} (${{ $producto->precio }})
                        </label>
                        <input
                            type="number" name="cantidades[]" placeholder="Cantidad" min="1" value="1"
                            class="w-16 border-gray-300 rounded p-1"
                        />
                    </div>
                @endforeach
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Crear Pedido
            </button>
        </form>
    </div>
@endsection
