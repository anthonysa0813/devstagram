@extends('layouts.app')

@section('title')
    Resultado de Busqueda
@endsection

@section('content')
<form class="container mx-auto px-10" action="{{ route('search') }}" method="GET">
    <input type="search" name="search" class="md:w-1/6 w-full rounded-xl" placeholder="Buscar usuario por su nombre">
</form>
<div class="container mx-auto flex justify-center items-center flex-col">
    @foreach ($users as $user)

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mt-5 mb-3 rounded-full shadow-lg" src="{{ $user->image ?  asset('perfiles') . "/" . $user->image :  asset('img/usuario.svg') }}" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
        <div class="flex mt-4 space-x-3 md:mt-6">

            <a href="{{ route('posts.index', $user) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-0">Ver Perfil</a>


            @auth
                    @if ($user->id !== auth()->user()->id)
                    @if (!$user->isFollowing(auth()->user()))
                        <form action="{{ route('follow.store', $user) }}" method="POST" class="">
                            @csrf
                            <input type="submit" value="follow" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        </form>
                    @else
                        <form action="{{ route('follow.destroy', $user) }}" method="POST" class="mt-2">
                            @method("DELETE")
                            @csrf
                            <input type="submit" value="unfollow" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        </form>
                    @endif
                    @endif
                @endauth
        </div>
    </div>
</div>

    @endforeach
</div>
@endsection
