<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            // Validación
            $validator = Validator::make($request->all(), [
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // 2MB max
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422); // Status code 422 para errores de validación
            }

            // Procesar el archivo
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');

                // Generar nombre único
                $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();

                // Guardar archivo (ajusta la ruta según tu estructura)
                $path = $photo->storeAs('photos', $filename, 'public');

                // Opcional: Guardar en base de datos
                // Photo::create([
                //     'post_id' => $id,
                //     'filename' => $filename,
                //     'path' => $path
                // ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Imagen subida exitosamente',
                    'filename' => $filename,
                    'path' => $path
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'No se recibió ningún archivo'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error del servidor: ' . $e->getMessage()
            ], 500);
        }
    }
}
