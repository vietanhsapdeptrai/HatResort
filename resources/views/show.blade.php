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
            <a href="/" class="text-xs font-bold text-amber-700 uppercase tracking-widest flex items-center gap-2 hover:opacity-80 transition">
                <i class="fa-solid fa-arrow-left text-sm"></i> Quay lại trang chủ
            </a>
            <h1 class="text-xl font-serif font-bold tracking-widest text-gray-900">
                HAT <span class="text-xs font-sans font-light tracking-normal block text-gray-500 -mt-1">HOTELS & RESORTS</span>
            </h1>
            <div class="w-28"></div>
        </div>
    </header>

    <main class="max-w-[1200px] mx-auto px-4 py-12">
        <!-- Khối chi tiết bố cục 2 cột lớn -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- CỘT TRÁI: HÌNH ẢNH & TIỆN ÍCH PHÒNG (Chiếm 7/12 cột) -->
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

            <!-- CỘT PHẢI: FORM ĐẶT PHÒNG NHANH CỐ ĐỊNH (Chiếm 5/12 cột) -->
            <div class="lg:col-span-5 lg:sticky lg:top-24">
                <div class="bg-white border border-gray-100 rounded-xl p-8 shadow-lg">
                    <h3 class="text-lg font-serif font-bold text-gray-900 mb-1">Đặt giữ phòng này</h3>
                    <p class="text-xs text-gray-400 mb-6">Vui lòng điền thông tin, chúng tôi sẽ liên hệ xác nhận ngay.</p>
                    
                    <!-- Form gửi thông tin lên hệ thống (Nhiệm vụ 3) -->
                    <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
    @csrf
    <input type="hidden" name="room_id" value="{{ $room->id }}">

    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-2">Họ và tên khách hàng</label>
        <input type="text" name="customer_name" required placeholder="Ví dụ: Đặng Việt Anh" 
               class="w-full px-4 py-3 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 transition bg-gray-50/50">
    </div>

    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-2">Số điện thoại liên hệ</label>
        <input type="tel" name="customer_phone" required placeholder="Ví dụ: 0912xxxxxx" 
               class="w-full px-4 py-3 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 transition bg-gray-50/50">
    </div>

    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-2">Ngày đến (Check-in)</label>
        <input type="text" name="check_in" required placeholder="Chọn ngày đến" 
               onfocus="(this.type='date')" onblur="(this.type='text')"
               class="w-full px-4 py-3 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 transition bg-gray-50/50">
    </div>

    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-2">Ngày đi (Check-out)</label>
        <input type="text" name="check_out" required placeholder="Chọn ngày đi" 
               onfocus="(this.type='date')" onblur="(this.type='text')"
               class="w-full px-4 py-3 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 transition bg-gray-50/50">
    </div>

    <div class="pt-4">
        <button type="submit" class="w-full text-center bg-gray-900 text-white font-bold text-xs uppercase tracking-widest py-4 px-6 rounded hover:bg-amber-700 transition duration-300 shadow-md">
            TIẾN HÀNH XÁC NHẬN ĐẶT
        </button>
    </div>
</form>
                    <!-- Cam kết dịch vụ bảo mật (UX Yên tâm) -->
                    <div class="mt-6 flex items-center justify-center space-x-2 text-[11px] text-gray-400">
                        <i class="fa-solid fa-shield-halved text-green-600"></i>
                        <span>HAT Resort cam kết bảo mật thông tin đặt chỗ.</span>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Thông báo Alert khi đặt phòng thành công -->
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Đặt Phòng Thành Công!',
            text: "{{ session('success') }}",
            icon: 'success',
            background: '#ffffff',
            iconColor: '#b45309', /* Màu vàng hổ phách đồng bộ với tone Amber của Melia */
            confirmButtonText: 'ĐỒNG Ý',
            confirmButtonColor: '#111827', /* Màu nút đen xám sang trọng */
            buttonsStyling: true,
            customClass: {
                popup: 'rounded-2xl shadow-2xl border border-gray-100',
                title: 'font-serif font-bold text-gray-900',
                confirmButton: 'px-6 py-3 font-bold text-xs uppercase tracking-widest rounded-lg'
            }
        });
    </script>
@endif

</body>
</html>