@extends('layout.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Iniciar Sesión</h1>
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo electrónico</label>
                <input
                    type="email" name="email" id="email"
                    class="w-full border-gray-300 rounded p-2"
                    value="{{ old('email') }}"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input
                    type="password" name="password" id="password"
                    class="w-full border-gray-300 rounded p-2"
                    required
                />
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Ingresar
            </button>
        </form>
    </div>
@endsection
