<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
{

    public function handle($request, Closure $next)
    {

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized access.'); // Redirect if not an admin
        }

        return $next($request);
    }

}
