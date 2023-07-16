<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        @stack('styles')
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    <body class="antialiased">
        <header class="p-5 bg-white border-b shadow">
            <div class="flex justify-between px-5 mx-auto">
                <div class="flex gap-4 items-center">
                    <a href="{{ route('home') }}" class="text-3xl font-black">Devstagram</a>

                </div>

                @auth
                    <nav class="flex items-center gap-4">

                    <a href="{{ route('posts.create') }}"  class="flex items-center justify-center gap-2 p-2 border border-gray-600 rounded rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        <span class="uppercase">Crear</span>
                    </a>
                    {{-- <a href="{{ route('posts.index', auth()->user()->username) }}" class="text-sm font-semibold ">Hola: <span class="lowercase">{{ auth()->user()->username }}</span></a> --}}
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer"  src="{{ auth()->user()->image ?  asset('perfiles') . "/" . auth()->user()->image :  asset('img/usuario.svg') }}" alt="User dropdown">

                        <!-- Dropdown menu -->
                        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ auth()->user()->name }}</div>
                            <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="{{ route('posts.index', auth()->user()->username) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Perfil</a>
                            </li>
                            <li>
                                <a href="{{ route('perfil.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            </ul>
                            <div class="py-1">
                              <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-md text-red-500 font-semibold uppercase px-4">Cerrar Sesión</button>
                            </form>
                            </div>
                        </div>

                </nav>
               @endauth

               @guest
                    <nav class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="text-sm font-semibold uppercase">Login</a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold uppercase">Crear cuenta</a>
                </nav>
               @endguest
            </div>
        </header>
        <main class="my-10">
            <div class="text-center">
                <h1 class="text-3xl font-bold">@yield('title')</h1>
            </div>
            @yield('content')
        </main>

        <footer class="p-5 font-semibold text-center ">
            Todos los derechos reservados {{ now()->year }}
        </footer>
        @livewireScripts
    </body>
</html>
