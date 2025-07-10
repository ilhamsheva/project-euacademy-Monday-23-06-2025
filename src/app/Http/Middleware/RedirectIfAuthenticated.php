<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guard = $guards[0] ?? null;

        if (Auth::guard($guard)->check()) {
            if (Auth::user()->hasRole('super_admin')) {
                return $next($request);
            }

            return redirect('/'); // user biasa ke homepage
        }

        return $next($request);
    }
}
