<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">ĐĂNG KÝ THÀNH VIÊN</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2 text-sm">Họ và tên</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-900" 
                       placeholder="Ví dụ: Đặng Việt Anh">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2 text-sm">Địa chỉ Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-900" 
                       placeholder="vietanh@example.com">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2 text-sm">Mật khẩu</label>
                <input type="password" name="password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-900" 
                       placeholder="Nhập ít nhất 6 ký tự">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2 text-sm">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-900" 
                       placeholder="Xác nhận lại mật khẩu giống ô trên">
            </div>

            <button type="submit" class="w-full bg-gray-900 text-white font-bold py-2 px-4 rounded hover:bg-amber-700 transition duration-200">
                ĐĂNG KÝ & ĐẶT PHÒNG NGAY
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Đã có tài khoản? <a href="/login" class="text-amber-700 hover:underline">Đăng nhập tại đây</a>
        </p>
    </div>

</body>
</html>