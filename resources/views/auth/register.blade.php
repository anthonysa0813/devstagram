@extends('layouts.app')

@section('title')
    Regístrate en DevStagram
@endsection

@section('content')
    <div class=" md:flex mx-auto md:w-4/5 mt-5">
        <div class="md:w-6/12 p-5 md:p-10 flex items-center">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen de registro" class="rounded-md">
        </div>
        <div class="md:w-6/12 p-5">
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-3 border p-5 shadow-xl rounded-lg">
                @csrf
                <div class="">
                    <label for="name" class="uppercase font-bold text-gray-500">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Tu Nombre" class="mt-1 w-full p-3 rounded-lg border  @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-center text-red-500 font-semibold mt-3">{{ $message }}</p>
                    @enderror
                </div>
                 <div class="">
                    <label for="username" class="uppercase font-bold text-gray-500">Username</label>
                    <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario" class="mt-1 w-full p-3 rounded-lg border  @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-center text-red-500 font-semibold mt-3">{{ $message }}</p>
                    @enderror
                </div>
                 <div class="">
                    <label for="email" class="uppercase font-bold text-gray-500">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu Email de Registro" class="mt-1 w-full p-3 rounded-lg border  @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-center text-red-500 font-semibold mt-3">{{ $message }}</p>
                    @enderror
                </div>
                 <div class="">
                    <label for="password" class="uppercase font-bold text-gray-500">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password de Registro" class="mt-1 w-full p-3 rounded-lg border  @error('password') border-red-500 @enderror" value="{{ old('password') }}">
                    @error('password')
                        <p class="text-center text-red-500 font-semibold mt-3">{{ $message }}</p>
                    @enderror
                </div>
                 <div class="">
                    <label for="password_confirmation" class="uppercase font-bold text-gray-500">Repetir Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu password" class="mt-1 w-full p-3 rounded-lg border">
                </div>
                <button class="w-full p-3 rounded-lg bg-sky-600 hover:bg-sky-700 uppercase text-white ">Crear cuenta</button>
            </form>
        </div>
    </div>
@endsection
