<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    /*leyendo las imagenes de request*/
    public function store(Request $request) {
        $imagen = $request->file('file');
 
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
 
        $imagenServidor = Image::configure(['driver' => 'gd'])->make($imagen);
        $imagenServidor->fit(1000,1000);
 
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
 
        $imagenServidor->save($imagenPath);
 
        return response()->json([
            'imagen' => $nombreImagen,
        ]);

    }
}
