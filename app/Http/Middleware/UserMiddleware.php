<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // asumsi kolom role di tabel users
        if (auth()->check() && auth()->user()->peran === 'user') {
            return $next($request);
        }

        abort(403, 'Akses khusus user');
        
    }
}
