@extends('layouts.app')

@section('title')
    Crea una nueva Publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endpush
@section('content')
    <div class="container mx-auto px-10 ">
        <div class="flex flex-col  gap-10 py-10 md:flex-row ">
            <div class="flex items-center md:w-1/2">
                <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data"  id="dropzone" class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded dropzone h-96">
                    @csrf
                </form>
            </div>
            <div class="md:w-1/2">
                <form action="{{ route('posts.store') }}" class="flex flex-col gap-4 p-10 bg-gray-100 shadow-xl rounded-xl" method="POST">
                    @csrf
                    <div class="">
                        <label for="title" class="font-bold text-gray-500 uppercase">Título:</label>
                        <input type="text" id="title" name="title" placeholder="Escribe un título" class="mt-1 w-full p-3 rounded-lg border  @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                        @error('title')
                            <p class="mt-3 font-semibold text-center text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="description" class="font-bold text-gray-500 uppercase">Descripción:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="w-full border rounded-lg">{{ old("description") }}</textarea>
                        @error('description')
                            <p class="mt-3 font-semibold text-center text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <input type="text" name="image" hidden>
                         @error('image')
                            <p class="mt-3 font-semibold text-center text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full p-3 text-white uppercase rounded-lg bg-sky-600 hover:bg-sky-700 ">Publicarlo</button>
                </form>
            </div>
        </div>
    </div>
@endsection
