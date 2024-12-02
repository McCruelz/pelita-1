<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memastikan pengguna sudah login dengan guard 'admin'
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Jika tidak terautentikasi sebagai admin, redirect ke halaman login admin
        return redirect()->route('admin.login');
    }
}
