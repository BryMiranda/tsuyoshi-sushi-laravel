@extends('layout.app')

@section('title', 'Crear Producto')

@section('content')
    <div class="bg-white p-4 shadow rounded max-w-md mx-auto">
        <h2 class="text-xl font-bold mb-4">Nuevo Producto</h2>
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input
                    type="text" name="nombre"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('nombre') }}"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Descripción</label>
                <textarea name="descripcion" rows="3" class="w-full border-gray-300 rounded p-2">{{ old('descripcion') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Precio</label>
                <input
                    type="number" step="0.01" name="precio"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('precio') }}"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Stock</label>
                <input
                    type="number" name="stock"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('stock') ?? 0 }}"
                />
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Guardar
            </button>
        </form>
    </div>
@endsection
