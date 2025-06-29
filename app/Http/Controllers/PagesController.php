<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    //Si lo definimos directamente aca tendriamos que usar esta linea sin importar el modelo
    //$posts = \App\Post::with(['category', 'tags'])->latest()->get();

    $posts = Post::with(['category', 'tags'])->latest()->get(); // Asegúrate que has importado el modelo Post
    return view('posts.index', compact('posts'));
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
