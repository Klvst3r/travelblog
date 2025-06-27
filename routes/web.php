<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//posts
use App\Http\Controllers\PagesController;


use App\Http\Controllers\Lock\LockscreenController;

//Posts de admin
use App\Http\Controllers\Admin\PostsController;

//Rutas protegidas
use App\Http\Controllers\HomeController;


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

Route::get('/', [PagesController::class, 'index'])->name('posts.index');

//Ya no utilizamos este clousure, es decir no utilizamos el controlador
// Route::get('home', function(){
//     return view('admin.dashboard');
// })->middleware('auth');

Route::get('posts', function(){
    return Post::all();
});


//Catalogo de Marca
Route::get('/catalogos/marca', function () {
    return view('catalogos.marca.index');
})->name('catalogos.marca');


Route::get('/posts', [PagesController::class, 'index'])->name('posts.index');


//Grupo para la adminisración
Route::group(['prefix' => 'home'], function(){
    Route::get('home/posts', [PostsController::class, 'index']);
} );

//Posts
//Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');


//Ruta para post de admin
//Route::get('home/posts','Admin\PostsController@index');
//Route::get('home/posts', [PostsController::class, 'index']);  //Pasa al grupo de home





//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas con autenticacion
//Route::auth();

//Rutas de autenticacion
// Route::get('login','Auth\LoginController@showLoginForm')->name('login');
// Route::post('login','Auth\LoginController@login');
// Route::post('logout','Auth\LoginController@logout')->name('logout');

// Rutas de autenticación modernas
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//Vistas de Prueba
// Route::get('lockscreen', function(){
//     return view('lockscreen.index');
// });
// Utilizamos el controlador de bloqueo de sesion

// Mostrar lockscreen
Route::get('/lockscreen', [LockscreenController::class, 'show'])->name('lockscreen');

// Desbloquear
Route::post('/unlock', [LockscreenController::class, 'unlock'])->name('unlock');




//Rutas de registro
//Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register','Auth\RegisterController@register');

//Rutas de registro odernas
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

//Rutas para reseteo de password
// Route::get('password/retes', 'AuthForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}','Auth\ResetPässwordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Rutas protegidas
//home
// Rutas protegidas por autenticación y lockscreen
/*En esta ruta que aplica el middleware y utilizamos el controlador esta protegida*/
Route::middleware(['auth', 'lockscreen'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Otras rutas protegidas aquí
    // Route::get('/perfil', [PerfilController::class, 'index']);
});


//Middleware de inactividad
Route::middleware(['auth', 'inactivity', 'lockscreen'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});