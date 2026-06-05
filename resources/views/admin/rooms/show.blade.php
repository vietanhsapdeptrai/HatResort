<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng {{ $room->room_number }} - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- HEADER TINH TẾ (Quay lại trang chủ) -->
    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-amber-700 uppercase tracking-widest flex items-center gap-2 hover:opacity-80 transition">
                 <i class="fa-solid fa-arrow-left text-sm"></i> Quay lại trang quản trị
            </a>
            <h1 class="text-xl font-serif font-bold tracking-widest text-gray-900">
                HAT <span class="text-xs font-sans font-light tracking-normal block text-gray-500 -mt-1">HOTELS & RESORTS</span>
            </h1>
            <div class="w-28"></div>
        </div>
    </header>

    <main class="max-w-[1200px] mx-auto px-4 py-12">
            <div class="lg:col-span-7 space-y-8">
                <!-- Ảnh Panorama tràn góc lớn -->
                <div class="w-full h-[450px] bg-gray-200 rounded-xl overflow-hidden shadow-sm relative group">
                    <div class="w-full h-full bg-cover bg-center transition duration-700 group-hover:scale-105" 
                         style="background-image: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=1200&q=80');">
                    </div>
                    <span class="absolute top-4 left-4 bg-gray-900/80 backdrop-blur text-white font-bold text-[10px] uppercase tracking-widest px-3 py-1.5 rounded">
                        {{ $room->type }}
                    </span>
                </div>

                <!-- Thông tin tiêu đề và giá -->
                <div class="border-b border-gray-200 pb-6">
                    <h2 class="text-3xl font-serif font-bold text-gray-900 mb-2">Hạng phòng: {{ $room->room_number }}</h2>
                    <p class="text-2xl font-bold text-amber-700">
                        {{ number_format($room->price, 0, ',', '.') }}đ <span class="text-xs font-normal text-gray-400">/ đêm (Giá tiêu chuẩn)</span>
                    </p>
                </div>

                <!-- Mô tả phòng -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">Mô tả không gian</h3>
                    <p class="text-gray-600 text-sm leading-relaxed font-light">
                        {{ $room->description ?? 'Chào mừng bạn đến với không gian nghỉ dưỡng thượng lưu tại HAT Resort. Phòng được trang bị đầy đủ nội thất gỗ tự nhiên cao cấp, hệ thống điều hòa trung tâm êm ái, minibar phong phú cùng ban công rộng mở đón trọn làn gió mát lành và tầm nhìn ngoạn mục ra khuôn viên xanh mướt của resort.' }}
                    </p>
                </div>

                <!-- Tiện ích đi kèm (HCI Điểm cộng: Icon minh họa trực quan) -->
                <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-900 mb-4">Trang thiết bị & Tiện ích kèm theo</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-xs text-gray-600 font-medium">
                        <div class="flex items-center space-x-2"><i class="fa-solid fa-wifi text-amber-700 w-4"></i> <span>Wi-Fi Tốc độ cao</span></div>
                        <div class="flex items-center space-x-2"><i class="fa-solid fa-snowflake text-amber-700 w-4"></i> <span>Điều hòa nhiệt độ</span></div>
                        <div class="flex items-center space-x-2"><i class="fa-solid fa-tv text-amber-700 w-4"></i> <span>Smart TV 55 inch</span></div>
                        <div class="flex items-center space-x-2"><i class="fa-solid fa-wine-glass text-amber-700 w-4"></i> <span>Quầy Minibar miễn phí</span></div>
                        <div class="flex items-center space-x-2"><i class="fa-solid fa-mug-hot text-amber-700 w-4"></i> <span>Máy pha cà phê</span></div>
                        <div class="flex items-center space-x-2"><i class="fa-solid fa-bath text-amber-700 w-4"></i> <span>Bồn tắm & Vòi sen</span></div>
                    </div>
                </div>
            </div>
    </main>
    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        &copy; 2026 HAT RESORT - Project by Đặng Việt Anh. All rights reserved.
    </footer>
</body>
</html>