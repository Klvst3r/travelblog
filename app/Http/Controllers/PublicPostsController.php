<?php

namespace App\Http\Controllers;


//importamos el modelo Post
use App\Models\Post;

use Illuminate\Http\Request;

class PublicPostsController extends Controller
{
    public function show(Post $post)
    {
        //return $id;

        //$post = Post::find($id); se quita esta linea por el uso de Model Bindings
        //return view('posts.show', compact('post'));
        return view('posts.show', compact('post'));
    }
}
