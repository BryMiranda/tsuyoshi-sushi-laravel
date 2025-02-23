@extends('layout.app')

@section('title', 'Registro')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-md w-full bg-white p-6 rounded shadow">
            <h1 class="text-xl font-bold mb-4 text-center">Registrarse</h1>
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input
                        type="text" name="name" id="name"
                        class="w-full border border-gray-300 rounded p-2"
                        value="{{ old('name') }}"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo electrónico</label>
                    <input
                        type="email" name="email" id="email"
                        class="w-full border border-gray-300 rounded p-2"
                        value="{{ old('email') }}"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input
                        type="password" name="password" id="password"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                    <input
                        type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">Tipo de Usuario</label>
                    <select name="role" id="role" class="w-full border border-gray-300 rounded p-2">
                        <option value="cliente">Cliente</option>
                        <option value="empleado">Empleado</option>
                        <option value="repartidor">Repartidor</option>
                    </select>
                </div>
                <button class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Registrarse
                </button>
            </form>
        </div>
    </div>
@endsection
