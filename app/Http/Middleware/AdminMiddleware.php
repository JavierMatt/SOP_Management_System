<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // cek admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // iseng hehe
        return redirect()->route('login')->with('error', 'Unauthorized access: Admin role required.');
    }
    }

