<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tsuyoshi Sushi')</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.x/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo / Nombre de la app -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">
            Tsuyoshi Sushi
        </a>

        <!-- Nav links (ejemplo) -->
        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login.form') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                <a href="{{ route('register.form') }}" class="text-gray-600 hover:text-gray-800">Registro</a>
            @endguest

            @auth
                <span class="text-gray-600">Hola, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-600 hover:text-red-800">Salir</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<div class="container mx-auto mt-6">
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>
