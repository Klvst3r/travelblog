<?php

namespace App\Http\Controllers\Lock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Use de sesiones de Laravel
use Illuminate\Support\Facades\Session;

// Importacion del alias  Hash en los facades
use Illuminate\Support\Facades\Hash;


class LockscreenController extends Controller
{
     public function show()
    {
        // Poner la bandera de bloqueo en sesión
        session(['locked' => true]);
        return view('lockscreen.index');
    }

    public function unlock(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Validar password del usuario logueado
        if (!Hash::check($request->password, auth()->user()->password)) {
            return back()->withErrors(['password' => ' Contraseña incorrecta, por favor intente ']);
        }

        // Desbloquear
        session()->forget('locked');
        //return redirect('/home'); //Dashboard después del desbloqueo
        //Redirigimos la ruta con nombre home 
        return redirect()->route('home.index');
    }
}
