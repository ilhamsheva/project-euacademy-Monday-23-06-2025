<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyUser
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Cek login pakai guard `user`
        if (auth('user')->check() && auth('user')->user()->hasRole('user')) {
            return $next($request);
        }

        // ❌ Kalau login tapi bukan user, bisa redirect ke /admin misalnya
        if (auth()->check()) {
            return redirect('/admin')->with('error', 'Akses ini hanya ntuk user.');
        }

        // ❌ Kalau belum login, redirect ke login khusus user
        return redirect()->route('login')->with('error', 'Silakan login sebagai user.');
    }
}
