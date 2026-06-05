<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAT Resort - Thiên đường nghỉ dưỡng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900 font-sans">

    <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center group">
                <h1 class="text-2xl font-black text-indigo-700 tracking-tighter transition-transform duration-300 group-hover:scale-105">
                    HAT <span class="text-gray-900 font-light">RESORT</span>
                </h1>
            </a>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="#main" class="nav-link">Trang chủ</a>
                <a href="#rooms" class="nav-link">Phòng nghỉ</a>
                <a href="#news" class="nav-link">Tin tức</a>
                <a href="/login" class="ml-4 px-6 py-2 bg-indigo-600 text-white text-sm font-bold rounded-full hover:bg-indigo-700 transition-all shadow-md shadow-indigo-100">
                    ĐĂNG NHẬP
                </a>
            </nav>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-indigo-600 focus:outline-none p-2 transition-colors">
                    <i class="fa-solid fa-bars-staggered text-2xl"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-xl transition-all duration-300 ease-in-out">
            <div class="px-6 py-6 flex flex-col space-y-4">
                <a href="/" class="text-base font-bold text-gray-700 hover:text-indigo-600 py-2 border-b border-gray-50">Trang chủ</a>
                <a href="#rooms" class="text-base font-bold text-gray-700 hover:text-indigo-600 py-2 border-b border-gray-50">Phòng nghỉ</a>
                <a href="#news" class="text-base font-bold text-gray-700 hover:text-indigo-600 py-2 border-b border-gray-50">Tin tức</a>
                <a href="/login" class="w-full text-center py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg">
                    ĐĂNG NHẬP
                </a>
            </div>
        </div>
    </header>

<style>
    .nav-link {
        @apply relative text-sm font-bold text-gray-600 uppercase tracking-wide transition-colors duration-300 hover:text-indigo-600;
    }
    /* Hiệu ứng gạch chân trượt từ giữa ra */
    .nav-link::after {
        content: '';
        @apply absolute left-1/2 bottom-[-4px] w-0 h-[2px] bg-indigo-600 transition-all duration-300 transform -translate-x-1/2;
    }
    .nav-link:hover::after {
        @apply w-full;
    }
</style>

    <div class="relative h-96 bg-indigo-900 flex items-center justify-center text-white">
        <div class="text-center">
            <h2 class="text-5xl font-extrabold mb-4 italic">Trải nghiệm kỳ nghỉ tuyệt vời</h2>
            <p class="text-xl opacity-90">Sự sang trọng và tinh tế trong từng chi tiết</p>
        </div>
    </div>

    <section id="rooms" class="max-w-7xl mx-auto px-4 py-16">
        <h3 class="text-3xl font-bold mb-10 text-center uppercase tracking-widest">Danh sách phòng nghỉ</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($rooms as $room)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition">
                <div class="h-56 bg-gray-300 flex items-center justify-center text-gray-500 italic">
                    <!-- [Ảnh phòng {{ $room->room_number }}] -->
                    <!-- <img src="{{ asset('images/' . $room->image) }}" alt="Phòng {{ $room->room_number }}" class="w-full h-full object-cover"> -->
                    <img src="{{ asset('images\room.jpeg') }}" alt="Phòng {{ $room->room_number }}" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs font-bold text-indigo-500 uppercase">{{ $room->type }}</span>
                        <span class="font-bold text-xl text-green-600">{{ number_format($room->price) }}đ</span>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Phòng {{ $room->room_number }}</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $room->description }}</p>
                    
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <div class="space-y-2">
                            <!-- <input type="text" name="customer_name" placeholder="Tên của bạn" required class="w-full text-sm border p-2 rounded">
                            <input type="text" name="customer_phone" placeholder="Số điện thoại" required class="w-full text-sm border p-2 rounded"> -->
                            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 rounded hover:bg-indigo-700 transition">
                                <a href="#">ĐẶT PHÒNG NGAY</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- <section id="news" class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-3xl font-bold mb-10 text-center uppercase tracking-widest">Tin tức & Thông báo</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($news as $item)
                <div class="bg-white p-6 rounded-lg shadow">
                    <span class="text-blue-500 text-xs font-bold">{{ $item->category }}</span>
                    <h5 class="text-lg font-bold mt-2 mb-3">{{ $item->title }}</h5>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->content, 100) }}</p>
                    <span class="text-gray-400 text-xs">Đăng bởi: {{ $item->created_by }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section> -->

    <footer class="bg-indigo-950 text-white py-10 text-center text-sm opacity-80">
        &copy; 2026 HAT RESORT - Project by Đặng Việt Anh. All rights reserved.
    </footer>

    @if(session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif

    <script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    btn.addEventListener('click', () => {
        // Toggle (bật/tắt) class 'hidden' để hiện/ẩn menu
        menu.classList.toggle('hidden');
        
        // Thay đổi icon từ 'bars' sang 'xmark' khi mở menu (HCI Feedback)
        const icon = btn.querySelector('i');
        if (menu.classList.contains('hidden')) {
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars-staggered');
        } else {
            icon.classList.remove('fa-bars-staggered');
            icon.classList.add('fa-xmark');
        }
    });

    // Tự động đóng menu khi nhấn vào một đường link (tránh che khuất nội dung)
    const links = menu.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
        });
    });
</script>
</body>
</html>