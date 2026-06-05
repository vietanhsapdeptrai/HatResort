<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tài khoản - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-xl border shadow-sm w-full max-w-md relative">
        <a href="/" class="text-xs font-bold text-amber-700 tracking-wider uppercase mb-4 inline-block"><i class="fa-solid fa-arrow-left"></i> Trang chủ</a>
        
        <h2 class="text-2xl font-serif font-bold text-gray-900 mb-1">Cập Nhật Thông Tin</h2>
        <p class="text-xs text-gray-400 mb-6">Thay đổi thông tin hồ sơ khách hàng của bạn tại hệ thống</p>

        @if ($errors->any())
            <div class="bg-red-50 text-red-700 p-3 rounded text-xs mb-4 border border-red-100">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-50 text-green-700 p-3 rounded text-xs mb-4 border border-green-100 font-medium">
                <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Địa chỉ Email (Không thể thay đổi)</label>
                <input type="email" value="{{ $user->email }}" disabled 
                       class="w-full px-3 py-2 border border-gray-200 rounded bg-gray-100 text-gray-500 text-sm cursor-not-allowed">
            </div>

            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Họ và tên khách hàng</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full px-3 py-2 border border-gray-200 rounded focus:outline-none focus:border-gray-900 text-sm">
            </div>

            <div class="border-t border-gray-100 pt-4 mt-2">
                <p class="text-xs font-bold text-amber-700 mb-3 uppercase tracking-wider">Đổi mật khẩu tài khoản</p>
                <p class="text-[11px] text-gray-400 mb-3 leading-relaxed">* Để trống 2 ô phía dưới nếu bạn muốn tiếp tục sử dụng mật khẩu cũ hiện tại.</p>
            </div>

            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Mật khẩu mới</label>
                <input type="text" name="password" placeholder="Nhập ít nhất 6 ký tự..."
                       class="w-full px-3 py-2 border border-gray-200 rounded focus:outline-none focus:border-gray-900 text-sm">
            </div>

            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Xác nhận lại mật khẩu mới</label>
                <input type="text" name="password_confirmation" placeholder="Gõ lại mật khẩu mới giống ô trên..."
                       class="w-full px-3 py-2 border border-gray-200 rounded focus:outline-none focus:border-gray-900 text-sm">
            </div>

            <div class="space-y-3 mt-4">
                <button type="submit" class="w-full bg-gray-900 hover:bg-amber-700 text-white font-bold text-xs py-3 rounded transition uppercase tracking-widest shadow-sm">
                    LƯU THAY ĐỔI HỒ SƠ
                </button>

                <a href="/" class="block text-center w-full border border-gray-300 hover:border-gray-900 text-gray-700 hover:text-gray-900 font-bold text-xs py-3 rounded transition uppercase tracking-widest">
                    HỦY BỎ
                </a>
            </div>
        </form>
    </div>

</body>
</html>