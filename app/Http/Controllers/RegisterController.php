<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // 1. Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('auth.register'); // Sẽ tạo file view này ở bước 3
    }

    // 2. Xử lý dữ liệu khi nhấn nút Đăng Ký
    public function register(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // bắt buộc có ô nhập lại password thương thích
        ], [
            'email.unique' => 'Email này đã được sử dụng rồi!',
            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp.',
            'password.min' => 'Mật khẩu phải từ 6 ký tự trở lên.'
        ]);

        // Tạo User mới (Cột role dưới DB sẽ tự ăn giá trị mặc định là 'user')
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 🔥 ĐIỂM MẤU CHỐT: Tự động đăng nhập luôn cho tài khoản vừa tạo
        Auth::login($user);

        // Điều hướng về trang Main (trang chủ) kèm thông báo thành công
        return redirect()->route('main');
    }



// Hàm xử lý đăng xuất tài khoản
public function logout(Request $request)
{
    // 1. Thực hiện đăng xuất xóa session auth
    Auth::logout();

    // 2. Hủy toàn bộ session cũ của user và tạo token session mới để bảo mật
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // 3. Đá người dùng quay trở về trang chủ kèm thông báo ngắn gọn
    return redirect()->route('main');
}
}