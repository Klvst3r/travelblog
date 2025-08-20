<?php

use Illuminate\Support\Facades\Route;

//posts
use App\Http\Controllers\PagesController;

use App\Models\Post;

use App\Http\Controllers\Lock\LockscreenController;

//Rutas protegidas
use App\Http\Controllers\Admin\HomeController;

//Posts de admin
use App\Http\Controllers\Admin\PostsController;
//Vamos a a usar un alias para la administarción
//use App\Http\Controllers\Admin\PostsController as AdminPostsController;

use App\Http\Controllers\Admin\AdminController;

//Login
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//Post Publicos
use App\Http\Controllers\PublicPostsController;



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

// Route::get('/', function () {
//     // $posts = Post::all();     //Anteriormente debvolvia todos los post

//     $posts = Post::latest('published_at')->get();                    // Los ordena por fecha de creación
//     //return view('welcome')->with('posts', $posts);  //Devolvemos los valores de la consylta a la vista

//     return view('welcome', compact('posts')); //Envia un array ['posts' => $posts]
// });

//Route::get('/', [PagesController::class, 'index'])->name('posts.index');
// Esta es la ruta pública en la raíz

Route::get('/', [PagesController::class, 'index'])->name('index');
//Route::get('blog/{id}', [PublicPostsController::class, 'show']);
//Actualizamos el archivo de las url amigables, anteriormente se utilizaba consulta por id
//Route::get('blog/{post}', [PublicPostsController::class, 'show']);
Route::get('blog/{post}', [PublicPostsController::class, 'show'])->name('posts.show'); //visualixaciṕon de post individuales
//Nota: {post} activa el model binding y usará getRouteKeyName() automáticamente.


// Grupo protegido para usuarios autenticados con prefijo /home
Route::group([
    'prefix' => 'home',
    'middleware' => ['auth', 'lockscreen', 'inactivity'], // o los que necesites
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('admin/', [AdminController::class, 'index'])->name('admin');

    //Para create y edit de posts corresponden a un usuario autenticado su inserción por ello los meetodos
    // create y eadit asi como store y update deberan estar en el controlador de Home y no en Post ya que estos seran publicos para
    //Usuarios no autenticados

    Route::get('create/', [HomeController::class, 'create'])->name('home.create');
    Route::post('store/', [HomeController::class, 'store'])->name('home.store');
    Route::get('edit/{id}', [HomeController::class, 'edit'])->name('home.edit');
    Route::put('update/{id}', [HomeController::class, 'update'])->name('home.update');
});

// Rutas de autenticación (login/logout)
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Creaciónde post anonimos con usuarions no autenticados
Route::get('create/', [PostsController::class, 'create'])->name('post.create');

// Rutas de lockscreen
Route::get('/lockscreen', [LockscreenController::class, 'show'])->name('lockscreen');
Route::post('/unlock', [LockscreenController::class, 'unlock'])->name('unlock');

// Otras rutas públicas o catalogos
Route::get('/catalogos/marca', function () {
    return view('catalogos.marca.index');
})->name('catalogos.marca');
