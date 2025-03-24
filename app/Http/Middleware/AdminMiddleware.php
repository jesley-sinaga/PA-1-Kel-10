<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || (Auth::user()->role !== 'manager' && Auth::user()->role !== 'resepsionis')) {
            return redirect('/login')->withErrors(['access' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
        }
        return $next($request);
    }
}
