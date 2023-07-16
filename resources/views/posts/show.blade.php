@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')

  <div class="mx-auto mt-5 md:flex md:w-4/5">
        <div class="flex flex-col items-center p-5 md:w-6/12 md:p-10">
            <img src="{{ asset('uploads' . '/' . $post->image) }}" class="object-fill w-full rounded-md h-120" alt="Image de{{  $post->title }}}">
            <div class="flex flex-col w-full gap-4 mt-4">
                <div class="flex items-center gap-4">

                   @auth
                        <livewire:like-post :post="$post" />
                   @endauth

                    {{-- @auth
                        @if ($post->checkLikes(auth()->user()))

                            <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                                @csrf
                                <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                            </button>
                        </form>
                        @endif
                    @endauth --}}

                </div>
                <p class="block">{{ $post->created_at->diffForHumans() }}</p>
                <p>{{ $post->description }}</p>
                <p class="font-bold">Autor: {{ $post->user->name }} ({{ $post->user->username }})</p>
            </div>
           @auth
            @if ($post->user_id == auth()->user()->id)
                 <div class="container flex justify-start w-full mx-auto mt-3 ">
                <form action="{{ route('posts.delete', $post) }}" method="POST" >
                    @method("DELETE")
                    @csrf
                    <button class="px-5 py-2 font-bold text-white bg-red-600 rounded-md" type="submit">Eliminar Post</button>
                </form>
            </div>
            @endif
           @endauth
        </div>
        <div class="h-full p-5 mt-10 shadow-lg md:w-6/12">
            <h1 class="text-3xl text-center">Añade un Comentario</h1>
            @if (session('message'))
                <p class="my-3 text-center text-green-600">{{ session('message') }}</p>
            @endif
            @auth
                <form class="flex flex-col" method="POST" action="{{ route('comment.store', ['post' => $post, 'user' => $user]) }}">
                    @csrf
                    <label class="" for="comment">Añadir un comentario</label>
                    <textarea class="h-20 border" name="comment" id="comment" cols="10" rows="10"></textarea>
                    <button type="submit" class="w-full px-3 py-3 mt-5 font-bold text-white bg-blue-600 rounded-md">Añadir</button>
                </form>
            @endauth
            <div class="p-5 my-4 mt-5 bg-gray-100 rounded-md border-y-2 border-gray-50">
                @foreach ($post->comments as $comment)
                    <a href={{ route('posts.index', $comment->user->username) }} class="font-bold">{{ $comment->user->username }}</a>
                    <p>{{ $comment->comment }}</p>
                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                @endforeach
            </div>
        </div>
    </div>

@endsection
