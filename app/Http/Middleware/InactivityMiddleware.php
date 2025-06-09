<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InactivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $inactivityLimit = 300; // 5 minutos en segundos
        $lastActivity = session('last_activity');

        if ($lastActivity && (time() - $lastActivity > $inactivityLimit)) {
            session(['locked' => true]);
        }

        session(['last_activity' => time()]);

        return $next($request);
    }
}
