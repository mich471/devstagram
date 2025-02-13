@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data"  class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input
                        id="username"  
                        type="text"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username', auth()->user()->username) }}"
                    >
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen de Perfil
                    </label>
                    <div class="md:flex items-center gap-5 border rounded-lg">
                        <!-- Mostrar la imagen actual si existe -->
                        @if(auth()->user()->imagen)
                        <div class="mb-3">
                            <img id="imagenActual" src="{{ asset('perfiles/' . auth()->user()->imagen) }}" 
                                alt="Imagen de perfil" 
                                class="w-20 h-20 object-cover">
                        </div>
                        @endif
                        <input
                            id="imagen"  
                            name="imagen"
                            type="file"
                            class=" p-3 w-full rounded-lg"
                            accept=".jpg, .jpeg .png"
                        >
                    </div>
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
                        value="{{ old('email', auth()->user()->email) }}"
                    >
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="oldpassword" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password Actual
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
                    <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">Nueva Contraseña</label>
                    <input 
                        type="password" 
                        name="new_password" 
                        id="new_password"
                        placeholder="Password Nueva" 
                        class="p-3 w-full rounded-lg border">
                </div>
                <div class="mb-5">
                    <label for="new_password_confirmation" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Confirmar Password
                    </label>
                    <input
                        id="new_password_confirmation" 
                        type="password"
                        name="new_password_confirmation"
                        placeholder="Confirma tu Password"
                        class="border p-3 w-full rounded-lg"
                    >
                </div>
                <input 
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" 
                />
            </form>
        </div>
    </div>
@endsection

<script>
    // document.querySelector("form").addEventListener("submit", function() {
    //     document.querySelector("input[type='submit']").disabled = true;
    // });
</script>
<script>
    // function mostrarImagen(event) {
    //     const input = event.target;
    //     const file = input.files[0];
    //     const reader = new FileReader();

    //     reader.onload = function(e) {
    //         const imagenPreview = document.getElementById('imagenActual');
    //         imagenPreview.src = e.target.result; // Cambiar la fuente de la imagen con la nueva imagen seleccionada
    //     };

    //     if (file) {
    //         reader.readAsDataURL(file); // Leer el archivo como una URL de datos
    //     }
    // }
</script>
