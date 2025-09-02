<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request, $id)
    {
        //return 'Procesando imagen...';
        //return response()->json(['message' => 'Procesando imagen...']);
        // Respuesta JSON que Dropzone puede procesar
        return response()->json([
            'success' => true,
            'message' => 'Procesando imagen...'
        ]);
    }
}
