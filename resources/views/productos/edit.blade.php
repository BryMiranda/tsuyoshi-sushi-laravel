@extends('layout.app')

@section('title', 'Editar Producto')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-md w-full bg-white p-6 rounded shadow">
            <h1 class="text-xl font-bold mb-4 text-center">Editar Producto</h1>
            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                           class="w-full border border-gray-300 rounded p-2"
                           value="{{ old('nombre', $producto->nombre) }}" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3"
                              class="w-full border border-gray-300 rounded p-2">{{ old('descripcion', $producto->descripcion) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-gray-700">Precio</label>
                    <input type="number" name="precio" id="precio" step="0.01"
                           class="w-full border border-gray-300 rounded p-2"
                           value="{{ old('precio', $producto->precio) }}" required>
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-gray-700">Stock</label>
                    <input type="number" name="stock" id="stock"
                           class="w-full border border-gray-300 rounded p-2"
                           value="{{ old('stock', $producto->stock) }}">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Actualizar Producto
                </button>
            </form>
        </div>
    </div>
@endsection
