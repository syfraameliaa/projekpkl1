<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RS
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->usertype != 'rs') {
            return redirect('/login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman RS']);
        }
        return $next($request);
    }
}
