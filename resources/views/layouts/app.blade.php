<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevStagram - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>
            @auth
                <nav class="flex gap-2 items-center">
                    <a href="{{route('posts.create')}} "class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm">crear</a>
                    <a class="font-bold text-gray-600 text-sm" href="#">Hola <span
                            class="font-normal">{{ auth()->user()->username }}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesión</button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        DevStagram - Todos los Derechos Reservados
        {{ now()->year }}
    </footer>

</body>

</html>
