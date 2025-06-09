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
        return view('admin.dashboard');
    }
}
