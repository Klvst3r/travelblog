<?php

namespace App\Http\Controllers;


//importamos el modelo Post
use App\Models\Post;

use Illuminate\Http\Request;

class PublicPostsController extends Controller
{
    public function show($id)
    {
        //return $id;

        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
}
