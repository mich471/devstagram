@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
    <div class="md:w-6/12">
        <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
    </div>
    <div class="md:w-4/12  bg-white p-6 rounded-lg shadow">
        <form action="{{ route('register')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input
                    id="name"  
                    type="text"
                    name="name"
                    placeholder="Tu nombre"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ old('name')}}"
                >
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input
                    id="username" 
                    type="text"
                    name="username"
                    placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ old('username')}}"
                >
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input
                    id="email" 
                    type="email"
                    name="email"
                    placeholder="Tu email de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                     value="{{ old('email')}}"
                >
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input
                    id="password" 
                    type="password"
                    name="password"
                    placeholder="Pasword de registro"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"

                >
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir Password
                </label>
                <input
                    id="password_confirmation" 
                    type="password"
                    name="password_confirmation"
                    placeholder="Repite tu Password"
                    class="border p-3 w-full rounded-lg"
                >
            </div>
            <input 
                type="submit"
                value="Crear Cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" 
            >
        </form>
    </div>
</div>
@endsection