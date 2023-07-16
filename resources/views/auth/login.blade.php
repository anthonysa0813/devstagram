@extends('layouts.app')

@section('title')
    Regístrate en DevStagram
@endsection

@section('content')
    <div class=" md:flex mx-auto items-center md:w-4/5 mt-5 ">
        <div class="md:w-6/12 p-5 md:p-10 flex items-center">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen de registro" class="rounded-md">
        </div>
        <div class="md:w-6/12 p-5  h-full ">
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-3  p-5 shadow-xl rounded-lg ">
                @csrf
                @if (session('messageError'))
                        <p class="text-center text-red-500 font-semibold mt-3">{{ session('messageError') }}</p>
                @endif
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
                    <input type="checkbox" id="remember" name="remember"> <label for="">Mantener mi sesión abierta</label>
                </div>
                <button class="w-full p-3 rounded-lg bg-sky-600 hover:bg-sky-700 uppercase text-white ">Crear cuenta</button>
            </form>
        </div>
    </div>
@endsection
