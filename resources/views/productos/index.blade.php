@extends('layout.app')

@section('title', 'Lista de Productos')

@section('content')
    <div class="bg-white p-4 shadow rounded">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Productos</h2>
            <a href="{{ route('productos.create') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                Nuevo Producto
            </a>
        </div>

        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Precio</th>
                <th class="py-2 px-4">Stock</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($productos as $producto)
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-4">{{ $producto->id }}</td>
                    <td class="py-2 px-4">{{ $producto->nombre }}</td>
                    <td class="py-2 px-4">${{ $producto->precio }}</td>
                    <td class="py-2 px-4">{{ $producto->stock }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="text-blue-500 hover:text-blue-600 mr-2">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-600" onclick="return confirm('¿Eliminar producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="py-4 px-4 text-center">No hay productos</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
