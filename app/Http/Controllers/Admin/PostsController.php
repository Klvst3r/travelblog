<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post; // Si usas el modelo Post


class PostsController extends Controller
{
     public function index()
    {
        $posts = Post::all(); // o como lo manejes
        return view('home.index', compact('posts')); // vista correcta según lo que dijiste
    }

    public function create(){
        return view('home.create');
    }

    public function store(){
        
    }
}
