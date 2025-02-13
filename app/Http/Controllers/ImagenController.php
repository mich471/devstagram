<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request) {
        // Obtener la imagen desde la solicitud
        $imagen = $request->file('file');
        
        // Generar nombre único para la imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        
        // Usar el driver GD para procesar la imagen
        $imagenServidor = Image::configure(['driver' => 'gd'])->make($imagen);
        
        // Redimensionar la imagen a 1000x1000
        $imagenServidor->cover(1000, 1000);
        
        // Guardar la imagen en el servidor
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
        
        // Retornar la respuesta con el nombre de la imagen
        return response()->json([
            'imagen' => $nombreImagen,
        ]);
    }
}
