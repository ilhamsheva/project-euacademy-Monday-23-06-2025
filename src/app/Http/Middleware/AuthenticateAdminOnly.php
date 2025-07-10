<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        // Izinkan lewat jika sedang di halaman login
        if ($request->is('admin/login') || $request->is('admin/password*')) {
            return $next($request);
        }

        // Cek login
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek role
        if (!Auth::user()->hasRole('super_admin')) {
            return redirect('/')->with('error', 'Akses hanya untuk administrator.');
        }

        return $next($request);
    }

}
