<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    //
    public function index () {
        return view('auth.register');
    }
    public function store(Request $request) {
        //dd($request);
        //dd($request->get('email'));

        //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //dd($request->username);

        //Validacion
        $request->validate([
            'name' => 'required|max:30',
            'username' =>'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);
        
        //Crear registro
        User::create([
            'name' => $request->name,
            'username' => $request->username, //modifivar el request,
            'email' => $request->email,
            'password' => Hash::make($request->password)//class Hash hashea pass 
        ]);
        

        // Autenticar un usuario
        /*Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/

        //Otra forma de autenticar
        Auth::attempt($request->only('email', 'password' ));

        //Redireccionar
        return redirect()->route('posts.index', ['user' => Auth::user()->username]);

    }
}
