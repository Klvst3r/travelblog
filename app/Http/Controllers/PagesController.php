<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //Entro otrs cosas par autilizar el query Scope

//Manejos de Fechas
//use Carbon\Carbon; //Ya se utulizo en el modelo

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Si lo definimos directamente aca tendriamos que usar esta linea sin importar el modelo
        //$posts = \App\Post::with(['category', 'tags'])->latest()->get();

        //$posts = Post::with(['category', 'tags'])->latest()->get(); // Asegúrate que has importado el modelo Post

        // $posts = Post::whereNotNull('published_at')
        //          ->latest('published_at')
        //          ->get();
        //consulta final
        // $posts = Post::whereNotNull('published_at')
        //              ->where('published_at', '<=', Carbon::now())
        //              ->latest('published_at')
        //              ->get();

        //$posts = Post::published()->get(); //sintaxis deseada y vamos a uilizar query scopes

        //return view('posts.index', compact('posts'));
        $posts = Post::latest('published_at')->get();
        return view('welcome', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
