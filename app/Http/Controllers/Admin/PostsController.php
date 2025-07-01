<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post; // Si usas el modelo Post

//Modelo de categorias para enviarlas al form
use App\Models\Category;


class PostsController extends Controller
{
     public function index()
    {
        $posts = Post::all(); // o como lo manejes
        return view('home.index', compact('posts')); // vista correcta según lo que dijiste
    }

    public function create(){
         $categories = Category::all(); // O podemos usar Category::pluck('name', 'id')
        return view('home.create', compact('categories'));
    }

    public function store(){
        
    }
}
