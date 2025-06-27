<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
         $articulos = collect([
            (object) ['clave' => 'ART001', 'descripcion' => 'Artículo de prueba 1'],
            (object) ['clave' => 'ART002', 'descripcion' => 'Artículo de prueba 2'],
            (object) ['clave' => 'ART003', 'descripcion' => 'Artículo de prueba 3'],
            (object) ['clave' => 'ART004', 'descripcion' => 'Artículo de prueba 4'],
        ]);

        return view('home.index', compact('articulos'));
    }
}
