<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek user role
        if (auth()->check() && auth()->user()->role === 'user') {
            return $next($request);
        }

        // iseng doang
        return redirect()->route('login')->with('error', 'Unauthorized access: User role required.');
    }
}
