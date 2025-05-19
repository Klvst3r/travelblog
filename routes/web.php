<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $posts = Post::all();     //Anteriormente debvolvia todos los post

    $posts = Post::latest('published_at')->get();                    // Los ordena por fecha de creación
    //return view('welcome')->with('posts', $posts);  //Devolvemos los valores de la consylta a la vista

    return view('welcome', compact('posts')); //Envia un array ['posts' => $posts]
});

Route::get('posts', function(){
    return Post::all();
});
