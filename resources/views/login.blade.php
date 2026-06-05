<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - HAT Hotels & Resorts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link class="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <header class="bg-white border-b border-gray-100 relative z-50">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center md:px-8">
            <div class="flex items-center space-x-3">
                <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-amber-700 hover:bg-gray-100 focus:outline-none transition">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>

                <a href="/" class="flex flex-col">
                    <span class="text-xl font-bold tracking-widest text-gray-900 leading-tight">HAT</span>
                    <span class="text-[9px] text-gray-500 font-semibold tracking-wider uppercase -mt-1">Hotels & Resorts</span>
                </a>
            </div>
        </div>

        <div id="mobile-menu" class="hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-xl">
            <div class="px-6 py-6 flex flex-col space-y-4 font-medium text-sm text-gray-700">
                <a href="/" class="hover:text-amber-700 py-2 border-b border-gray-50">Trang chủ</a>
                <a href="/#rooms" class="hover:text-amber-700 py-2 border-b border-gray-50">Phòng nghỉ</a>
                <a href="/#news" class="hover:text-amber-700 py-2 border-b border-gray-50">Tin tức</a>
            </div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white p-8 rounded-xl border shadow-sm">
            
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-950 uppercase tracking-wide">Đăng Nhập</h2>
                <p class="text-xs text-amber-700 font-semibold mt-1 uppercase tracking-wider">Hat Resort Management System</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-xs font-medium border border-red-200">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="login-form" action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="text-xs font-bold text-gray-500 block mb-1">Địa chỉ Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Nhập email của bạn..."
                           class="w-full border px-3 py-2.5 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 transition text-sm">
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-500 block mb-1">Mật khẩu</label>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                           class="w-full border px-3 py-2.5 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 transition text-sm">
                </div>

                <div class="flex items-center justify-between text-xs font-medium text-gray-600">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-gray-900 focus:ring-gray-900">
                        <span>Ghi nhớ đăng nhập</span>
                    </label>
                    <a href="#" class="hover:text-amber-700 transition">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold text-xs py-3.5 rounded transition uppercase tracking-wider shadow-sm mt-2">
                    Đăng nhập hệ thống
                </button>
            </form>

            <div class="text-center text-xs text-gray-500 mt-5 border-t border-gray-100 pt-4">
                Chưa có tài khoản khách? 
                <a href="{{ route('register') }}" class="text-amber-700 font-bold hover:underline ml-1">
                    Đăng ký thành viên ngay
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 py-6 text-center text-xs text-gray-400">
        &copy; 2026 HAT RESORT - Project by Đặng Việt Anh. All rights reserved.
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                const icon = btn.querySelector('i');
                if (icon) {
                    if (menu.classList.contains('hidden')) {
                        icon.classList.remove('fa-xmark');
                        icon.classList.add('fa-bars');
                    } else {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-xmark');
                    }
                }
            });
        }
    </script>
</body>
</html>