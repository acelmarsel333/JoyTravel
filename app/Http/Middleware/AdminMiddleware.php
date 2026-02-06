<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            abort(401);
        }

        if (auth()->user()->peran !== 'admin') {
            abort(403, 'Akses khusus admin');
        }

        return $next($request);
    }
}       