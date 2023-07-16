@extends('layouts.app')

@section('title')
    <h1 class="text-3xl font-bold">Editar Perfil: {{ auth()->user()->username }}</h1>
@endsection


@section('content')
    <div class="container flex justify-center mx-auto">
        <form class="" action="{{ route("perfil.index") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="username">Username: </label>
            <input type="text" name="username" value="{{ auth()->user()->username }}" class="w-full px-2 py-3 mb-3 border-2 border-gray-200 rounded-md ">
             @error('username')
                <p class="mt-3 font-semibold text-center text-red-500">{{ $message }}</p>
            @enderror
            <label for="image" class="mt-3 ">Foto de Perfil: </label>
            <input type="file"  name="image" class="w-full px-2 py-3 border-2 border-gray-200 rounded-md" accept=".jpeg, .png, .jpg">
             @error('image')
                <p class="mt-3 font-semibold text-center text-red-500">{{ $message }}</p>
            @enderror
            <button class="w-full px-2 py-3 mt-3 font-semibold text-white bg-blue-600 rounded-md">Guardar</button>
        </form>
    </div>
@endsection
