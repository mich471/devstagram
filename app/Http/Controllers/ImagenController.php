<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    /*leyendo las imagenes de request*/
    public function store(Request $request) {
        $imagen = $request->file('file');
 
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
 
        $manager = new ImageManager(new Driver());
 
        $imagenServidor = $manager::imagick()->read($imagen);
        $imagenServidor->cover(1000,1000);
 
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
 
        $imagenServidor->save($imagenPath);
 
        return response()->json([
            'imagen' => $nombreImagen,
        ]);

    }
}
