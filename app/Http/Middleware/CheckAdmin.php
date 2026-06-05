<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Nếu đã đăng nhập VÀ có quyền là admin thì cho phép đi tiếp
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Nếu không phải admin, đá văng về trang chủ kèm cảnh báo
        return redirect('/')->with('error', 'Bạn không có quyền truy cập vào khu vực quản trị!');
    }
}