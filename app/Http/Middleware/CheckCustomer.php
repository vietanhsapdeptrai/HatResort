<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        // Nếu đã đăng nhập VÀ là tài khoản customer thì mới cho qua
        if (Auth::check() && Auth::user()->role === 'customer') {
            return $next($request);
        }

        // Nếu admin cố tình vào trang của khách, đá sang trang quản trị admin luôn
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/admin-custom');
        }

        return redirect('/login');
    }
}