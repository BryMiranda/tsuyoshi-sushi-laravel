@extends('layout.app')

@section('title', 'Editar Producto')

@section('content')
    <div class="bg-white p-4 shadow rounded max-w-md mx-auto">
        <h2 class="text-xl font-bold mb-4">Editar Producto #{{ $producto->id }}</h2>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input
                    type="text" name="nombre"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('nombre', $producto->nombre) }}"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Descripción</label>
                <textarea
                    name="descripcion" rows="3"
                    class="w-full border-gray-300 rounded p-2"
                >{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Precio</label>
                <input
                    type="number" step="0.01" name="precio"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('precio', $producto->precio) }}"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Stock</label>
                <input
                    type="number" name="stock"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('stock', $producto->stock) }}"
                />
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Actualizar
            </button>
        </form>
    </div>
@endsection
