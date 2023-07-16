@extends('layouts.app')

@section('title')
    Tu Perfil
@endsection

@section('content')
    <div class="flex flex-col justify-center gap-6 mx-auto mt-10 md:flex-row md:w-8/12">
        <div class="flex justify-center lg:w-96 lg:max-h-96 sm:w-full p-5  ">
            <img class="rounded-full" src="{{ $user->image ?  asset('perfiles') . "/" . $user->image :  asset('img/usuario.svg') }}" alt="Logo de un usuario" class="w-8/12 h-1/2 mini-image">
        </div>
        <div class="flex flex-col items-center justify-center md:items-start md:w-8/12 lg:w-6/12">
            <div class="flex items-center gap-2">
            <h3 class="mb-2 font-bold">{{ $user->username }}  </h3>
            {{-- <livewire:like-post :post="$post" /> --}}
            @auth
                 @if ($user->id == auth()->user()->id)
                    <a href="{{ route('perfil.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-gray-500 cursor-pointer hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </a>
             @endif
            @endauth
            {{-- @endauth --}}
        </div>
            <div class="flex flex-col ">
                <p class="m-0 ">
                    {{ $user->followers->count() }}
                    <span> @choice('Seguidor|Seguidores', $user->followers->count()) </span>
                </p>
                <p class="m-0 ">
                      {{ $user->following->count() }}
                    <span> Siguiendo </span>
                </p>
                <p class="m-0 ">{{ $user->posts->count() }} Posts</p>
                @auth
                    @if ($user->id !== auth()->user()->id)
                    @if (!$user->isFollowing(auth()->user()))
                        <form action="{{ route('follow.store', $user) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="submit" value="follow" class="bg-blue-500 text-white text-md px-2 py-0 m-0 rounded-lg cursor-pointer">
                        </form>
                    @else
                        <form action="{{ route('follow.destroy', $user) }}" method="POST" class="mt-2">
                            @method("DELETE")
                            @csrf
                            <input type="submit" value="unfollow" class="bg-red-500 text-white text-md px-2 py-0 m-0 rounded-lg cursor-pointer">
                        </form>
                    @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="flex flex-col items-center">
        @if ($posts->count())
        <h1 class="text-3xl font-bold text-center">Publicaciones</h1>
        @else
        <h1 class="text-3xl font-bold text-center">No hay Posts</h1>

        @endif
        <div class="container px-10 my-10">
           <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($posts as $post)
                <a href="{{ route('posts.show',['post' =>  $post, 'user' => $user]) }}">
                    <img class="rounded rounded-lg" src="{{ asset('uploads' . '/' . $post->image) }}" alt="{{ $post->title }}">
                </a>
                @endforeach
           </div>
        </div>
        <div class="my-10">

            {{ $posts->links("pagination::tailwind") }}
        </div>
    </section>

@endsection
