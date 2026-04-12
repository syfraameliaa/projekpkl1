<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Puskes
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->usertype != 'puskes') {
            return redirect('/login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman Puskes']);
        }
        return $next($request);
    }
}
