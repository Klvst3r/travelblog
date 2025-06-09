<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LockscreenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

     public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && session('locked')) {
            // Evitar loop infinito si ya estamos en lockscreen
            if (!$request->is('lockscreen') && !$request->is('unlock')) {
                return redirect()->route('lockscreen');
            }
        }

        return $next($request);
    }


    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if (Hash::check($request->password, auth()->user()->password)) {
            session(['locked' => false]); // desbloquea
            return redirect()->intended('/home'); // para evolver el dashboard
        }

        return back()->withErrors(['password' => 'Contraseña incorrecta']);
    }


}
