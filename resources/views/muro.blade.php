@extends('layouts.app')

@section('title')
    Publicaciones
@endsection

@section('content')
<form class="container mx-auto px-10" action="{{ route('search') }}" method="GET">
    <input type="search" name="search" class="md:w-1/6 w-full rounded-xl" placeholder="Buscar usuario por su nombre">
</form>
<div class="container mx-auto flex justify-center items-center flex-col">
        {{-- <x-listar-post>
            <x-slot:title>
                hello world
            </x-slot:title>
        </x-listar-post> --}}
        <x-listar-post :posts="$posts"/>

    </div>
@endsection
