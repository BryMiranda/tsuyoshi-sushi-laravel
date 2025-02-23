<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tsuyoshi Sushi')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans">
<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo / Nombre de la app -->
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800">
            Tsuyoshi Sushi
        </a>

        <div class="flex items-center space-x-4">
            @auth
                @if(Auth::user()->role == 'administrador')
                    <a href="{{ route('productos.index') }}" class="text-gray-600 hover:text-gray-800">Productos</a>
                    <a href="{{ route('pedidos.index') }}" class="text-gray-600 hover:text-gray-800">Pedidos</a>
                @elseif(Auth::user()->role === 'empleado')
                    <a href="{{ route('empleado.pedidosPendientes') }}" class="text-gray-600 hover:text-gray-800">Pedidos Pendientes</a>
                @elseif(Auth::user()->role === 'repartidor')
                    <!-- Asegúrate de definir esta ruta en tus archivos de rutas -->
                    <a href="{{ route('entrega.dashboard') }}" class="text-gray-600 hover:text-gray-800">Entregas</a>
                @elseif(Auth::user()->role === 'cliente')
                    <a href="{{ route('pedidos.misPedidos') }}" class="text-gray-600 hover:text-gray-800">Mis Pedidos</a>
                @endif
            @endauth
        </div>

        <!-- Nav links -->
        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
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
