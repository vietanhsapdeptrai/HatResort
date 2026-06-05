<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ]);

        // 1. 🔥 TÌM USER TRONG DB TRƯỚC ĐỂ KIỂM TRA ĐỊNH DẠNG MẬT KHẨU
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Trường hợp A: Nếu password trong DB là text thô nhập tay (như tài khoản admin = '123')
            if ($user->password === $request->password) {
                Auth::login($user);
                $request->session()->regenerate();

                // Kiểm tra role để điều hướng
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('main');
            }

            // Trường hợp B: Nếu password trong DB đã được hash chuẩn (như tài khoản customer)
            // Ta dùng Auth::attempt mặc định của Laravel để check an toàn
            if (Auth::attempt($credentials, $request->has('remember'))) {
                $request->session()->regenerate();
                
                // Vì trong DB của bạn role cho user là 'customer' chứ không phải 'user'
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('main');
            }
        }

        // Đăng nhập thất bại (Sai email hoặc sai mật khẩu)
        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không chính xác.',
        ])->withInput($request->only('email'));
    }
}