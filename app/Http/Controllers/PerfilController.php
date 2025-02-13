<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Protege todas las rutas del controlador
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validacion
        $request->validate([
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
            'email' => 'required|email|unique:users,email,' . auth()->user()->id, // Validación para email único
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        // Validar que la contraseña proporcionada sea correcta
        if (!Hash::check($request->password, auth()->user()->password)) {
            return back()->withErrors(['password' => 'Contraseña incorrecta o no la Ingresaste']);
        }

        //Guardar Cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = Str::slug($request->username);
        $usuario->email = $request->email ?? auth()->user()->email;

        if ($request->new_password) {
            $usuario->password = Hash::make($request->new_password); // Guardar la nueva contraseña
        }

        if ($request->imagen) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            // Procesar imagen
             $imagenServidor = Image::configure(['driver' => 'gd'])->make($imagen);
             $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);

            $usuario->imagen = $nombreImagen;
        }

        // Guardar los cambios
        $usuario->save();

        //redireccionar
        return redirect()->route('posts.index', $usuario->username);
    }
}
