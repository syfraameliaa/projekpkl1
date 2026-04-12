<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class JR
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->usertype != 'jr') {
            return redirect('/login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman JR']);
        }
        return $next($request);
    }
}
