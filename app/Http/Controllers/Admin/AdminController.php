<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class AdminController extends Controller
{
    
     public function index()
    {
        //El siguiente arrglo es para ejmplo
        //  $articulos = collect([
        //     (object) ['clave' => 'ART001', 'descripcion' => 'Artículo de prueba 1'],
        //     (object) ['clave' => 'ART002', 'descripcion' => 'Artículo de prueba 2'],
        //     (object) ['clave' => 'ART003', 'descripcion' => 'Artículo de prueba 3'],
        //     (object) ['clave' => 'ART004', 'descripcion' => 'Artículo de prueba 4'],
        // ]);
        $posts = Post::all();
        return view('home.index', compact('posts'));

        //return view('admin.index');
    }
}
