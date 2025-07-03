<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request; //Para validacion y almaceamiento

use App\Models\Post; // Si usas el modelo Post
use App\Models\Tag; // Si usas el modelo Tag


//Modelo de categorias para enviarlas al form
use App\Models\Category;

//Vamos a utilizar fehcas para humanos
use Illuminate\Support\Carbon;


class PostsController extends Controller
{
     public function index()
    {
        $posts = Post::all(); // o como lo manejes
        return view('home.index', compact('posts')); // vista correcta según lo que dijiste
    }

    public function create(){
         $categories = Category::all(); // O podemos usar Category::pluck('name', 'id')
         $tags = Tag::all();
        return view('home.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        // Validación - incluye etiquetas
       $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        // Crear el post - i insertar los valores en la tabla
        $post = Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'published_at' => $request->filled('published_at') 
                                ? Carbon::parse($request->published_at)
                                : null,
        ]);


        //Asignar las etieuetas con la relacion de tags

        // Podemos utilizar: 
        // $post->tags()->attach($request->tags);

        
        // Asociar etiquetas (si hay relación many-to-many)
        //$post->tags()->sync($request->tags);
        
        // Relación con etiquetas (si existen)
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }        

        // Finalmente Redirigir con mensaje
        return redirect()->route('home.index')->with('success', 'Post creado exitosamente.');

    }

}
