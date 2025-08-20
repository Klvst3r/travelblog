<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Modelo para envio d einformacion a la vista
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Carbon; //Manejo de fechas
use Illuminate\Support\Str; //Generaciópn de las URL

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Esto servia para el clousure en el controller para redirigir a nuestra vista home
        //return view('home');

        //ahoa tenemos apuntando a nuestro daashboard
        //return view('admin.dashboard');  //vista anterior

        //return view('home.index');
        // El siguiente arrglo es para ejmplo
        //  $articulos = collect([
        //     (object) ['clave' => 'ART001', 'descripcion' => 'Artículo de prueba 1'],
        //     (object) ['clave' => 'ART002', 'descripcion' => 'Artículo de prueba 2'],
        //     (object) ['clave' => 'ART003', 'descripcion' => 'Artículo de prueba 3'],
        //     (object) ['clave' => 'ART004', 'descripcion' => 'Artículo de prueba 4'],
        // ]);
        //return view('home.index', compact('articulos'));

        //Este es el bueno
        $posts = Post::all(); // O puedes usar paginación si prefieres

        //podemos verificar el resualtado devuelto con:
        //return $post = Post::latest('publised_td')->get();

        return view('home.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
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

        // Crear el post - iinsertar los valores en la tabla
        $post = Post::create([
            'title' => $request->title,
            'url' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'published_at' => $request->filled('published_at')
                ? Carbon::parse($request->published_at)
                : null,
        ]);

        // Relación con etiquetas (si existen)
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        // Finalmente Redirigir con mensaje
        return redirect()->route('home.index')->with('success', 'Post creado exitosamente.');
    }

    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('home.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
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

        //Localiza el registro a actualizar
        $post = Post::findOrFail($id);


        // Actualiza el post - cambiando los valores en la tabla
        $post->update([
            'title' => $request->title,
            'url' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'published_at' => $request->filled('published_at')
                ? Carbon::parse($request->published_at)
                : null,
        ]);

        // Relación con etiquetas (si existen)
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        // Finalmente Redirigir con mensaje
        return redirect()->route('home.index')->with('success', 'Post actualizado exitosamente.');
    }
}
