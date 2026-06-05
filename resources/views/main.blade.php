<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAT Resort & Hotels</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .nav-item {
            @apply text-xs font-medium text-gray-700 tracking-wider hover:text-amber-700 transition duration-200 uppercase;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <header class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm">
        <div class="max-w-[1400px] mx-auto px-4 py-3 flex justify-between items-center">
            
            <div class="flex items-center space-x-4">
                <button id="mobile-menu-button" class="text-gray-800 p-1 hover:text-amber-700 transition lg:hidden">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <a href="/" class="text-xl font-serif font-bold tracking-widest text-gray-900">
                    HAT <span class="text-xs font-sans font-light tracking-normal block text-gray-500 -mt-1">HOTELS & RESORTS</span>
                </a>
            </div>

            <nav class="hidden lg:flex items-center space-x-8">
                <a href="#main" class="nav-item">Trang chủ</a>
                <a href="#rooms" class="nav-item">Phòng nghỉ</a>
                <a href="#news" class="nav-item">Tin tức</a>
            </nav>

            <div class="hidden lg:flex items-center">
                @auth
                    <div class="relative inline-block text-left group z-50">
                        <button type="button" class="flex items-center gap-2 focus:outline-none bg-gray-50 hover:bg-gray-100 px-3 py-2 rounded-full transition border border-gray-100">
                            <div class="w-7 h-7 rounded-full bg-gray-900 text-white flex items-center justify-center font-bold text-xs uppercase">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="text-xs font-semibold text-gray-700">{{ auth()->user()->name }}</span>
                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div class="absolute right-0 w-52 mt-1 origin-top-right bg-white border border-gray-100 rounded shadow-xl opacity-0 invisible scale-95 group-hover:opacity-100 group-hover:visible group-hover:scale-100 transition-all duration-150">
                            <div class="px-4 py-2.5 border-b border-gray-50 bg-gray-50/50">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Tài khoản</p>
                                <p class="text-xs font-bold text-gray-800 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="py-1 text-xs font-semibold">
                                <a href="{{ route('user.bookings') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition">
                                    <i class="fa-solid fa-hotel text-gray-400 w-4"></i> Phòng của tôi
                                </a>
                                <a href="{{ route('user.profile') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition">
                                    <i class="fa-solid fa-user-gear text-gray-400 w-4"></i> Cập nhật thông tin
                                </a>
                            </div>
                            <div class="border-t border-gray-50 py-1">
                                <form action="{{ route('logout') }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-xs font-bold text-red-600 hover:bg-red-50 transition">
                                        <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-gray-900 text-white text-sm font-semibold rounded hover:bg-amber-700 transition shadow-sm">
                        ĐĂNG NHẬP
                    </a>
                @endguest
            </div>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-xl z-50">
            <div class="px-6 py-6 flex flex-col space-y-4 font-medium text-sm text-gray-700">
                <a href="#main" class="hover:text-amber-700 py-2 border-b border-gray-50">Trang chủ</a>
                <a href="#rooms" class="hover:text-amber-700 py-2 border-b border-gray-50">Phòng nghỉ</a>
                <a href="#news" class="hover:text-amber-700 py-2 border-b border-gray-50">Tin tức</a>
                
                @auth
                    <div class="bg-gray-50 p-3 rounded-lg space-y-3 text-xs font-bold border border-gray-100">
                        <div class="text-gray-400 uppercase text-[10px] tracking-wider">Xin chào: {{ auth()->user()->name }}</div>
                        <a href="#" class="block text-gray-700 hover:text-amber-700"><i class="fa-solid fa-hotel mr-2"></i> Phòng của tôi</a>
                        <a href="#" class="block text-gray-700 hover:text-amber-700"><i class="fa-solid fa-user-gear mr-2"></i> Cập nhật thông tin</a>
                        <form action="{{ route('logout') }}" method="POST" class="pt-2 border-t border-gray-200">
                            @csrf
                            <button type="submit" class="w-full text-left text-red-600"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Đăng xuất</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="w-full text-center py-3 bg-gray-900 text-white font-bold rounded shadow-md">
                        ĐĂNG NHẬP
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <main id="main">
        <div class="relative w-full h-[55vh] md:h-[65vh] flex overflow-hidden bg-gray-200">
            <div class="hidden md:block w-[12%] h-full opacity-60 bg-cover bg-center transition duration-500 hover:opacity-80" 
                 style="background-image: url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80');">
            </div>

            <div class="flex-1 h-full bg-cover bg-center relative" 
                 style="background-image: url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=1200&q=80');">
                <a href="tel:0886612403" class="fixed bottom-6 right-6 w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center shadow-xl hover:bg-amber-700 transition z-50" title="Gọi ngay cho Resort">
                    <i class="fa-solid fa-phone-volume text-lg"></i>
                </a>
            </div>

            <div class="hidden md:block w-[12%] h-full opacity-60 bg-cover bg-center transition duration-500 hover:opacity-80" 
                 style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&q=80');">
            </div>
        </div>

        <div class="max-w-[1300px] mx-auto px-4 -mt-10 relative z-30">
            <div class="bg-white rounded-lg shadow-xl border border-gray-100 p-4 md:py-3 md:px-6 grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                <div class="flex items-center space-x-3 border-b md:border-b-0 md:border-r border-gray-200 pb-3 md:pb-0">
                    <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm"></i>
                    <div class="flex-1">
                        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider">Điểm đến</label>
                        <span class="text-sm font-semibold text-gray-800 block truncate">HAT Resort - Hà Nội, VN</span>
                    </div>
                </div>

                <div class="flex items-center space-x-3 border-b md:border-b-0 md:border-r border-gray-200 pb-3 md:pb-0">
                    <i class="fa-regular fa-calendar text-gray-400 text-sm"></i>
                    <div class="flex-1">
                        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider">Đến - Rời đi</label>
                        
                        <input type="text" name="check_in" placeholder="Chọn ngày chỗ này" 
                            class="text-sm font-semibold text-gray-800 bg-transparent outline-none w-full placeholder-gray-700" 
                            onfocus="(this.type='date')" onblur="(this.type='text')">
                            
                    </div>
                </div>

                <div class="flex items-center space-x-3 border-b md:border-b-0 pb-3 md:pb-0">
                    <i class="fa-solid fa-users text-gray-400 text-sm"></i>
                    <div class="flex-1">
                        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider">Hành khách</label>
                        <span class="text-sm font-semibold text-gray-800 block">1 Phòng - 2 Người lớn</span>
                    </div>
                </div>

                <div class="text-right">
                    <a href="#rooms" class="block w-full text-center bg-gray-900 text-white font-bold text-xs uppercase tracking-widest py-3 px-6 rounded hover:bg-amber-700 transition duration-300">
                        Chỉnh sửa tìm kiếm
                    </a>
                </div>
            </div>
        </div>

        <section id="rooms" class="max-w-[1300px] mx-auto px-4 py-20">
            <div class="text-center max-w-xl mx-auto mb-16">
                <h2 class="text-2xl font-serif font-bold text-gray-900 tracking-wide uppercase">Danh Sách Phòng Nghỉ</h2>
                <div class="w-12 h-[2px] bg-amber-700 mx-auto mt-3"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($rooms as $room)
                <div class="bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-64 bg-gray-200 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=600&q=80');"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <span class="text-[10px] font-bold text-amber-700 uppercase tracking-widest">{{ $room->type }}</span>
                            <p class="text-lg font-bold text-gray-900">{{ number_format($room->price, 0, ',', '.') }}đ<span class="text-xs font-normal text-gray-400">/đêm</span></p>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Phòng {{ $room->room_number }}</h3>
                        <p class="text-gray-500 text-xs line-clamp-2 mb-6 leading-relaxed">{{ $room->description }}</p>
                        <div class="flex space-x-3 text-xs font-bold tracking-wider">
                            <a href="{{ route('room.show', $room->id) }}" class="flex-1 text-center py-3 border border-gray-200 text-gray-700 rounded hover:border-gray-900 transition">CHI TIẾT</a>
                            <button onclick="openBookingModal({{ $room->id }}, '{{ $room->room_number }}')" class="flex-1 py-3 bg-gray-900 text-white rounded hover:bg-amber-700 transition">
                                ĐẶT NGAY
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>

    <div id="booking-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm" onclick="closeBookingModal()"></div>
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative z-10 transform transition-all duration-300 scale-95 opacity-0" id="modal-content">
            <button onclick="closeBookingModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-900">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
            <h3 class="text-lg font-serif font-bold text-gray-900 mb-1">Đặt phòng nhanh</h3>
            <p class="text-xs text-gray-400 mb-4">Bạn đang chọn: <span id="modal-room-number" class="font-bold text-amber-700"></span></p>

            <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
    @csrf
    <input type="hidden" name="room_id" id="modal-room-id">     
    
    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Họ và tên</label>
        <input type="text" name="customer_name" required value="{{ auth()->check() ? auth()->user()->name : '' }}" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 bg-gray-50/50">
    </div>
    
    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Số điện thoại</label>
        <input type="tel" name="customer_phone" required placeholder="Ví dụ: 0912xxxxxx" class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 bg-gray-50/50">
    </div>

    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Ngày đến (Check-in)</label>
        <input type="text" name="check_in" required placeholder="Chọn ngày đến" 
               onfocus="(this.type='date')" onblur="(this.type='text')"
               class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 bg-gray-50/50">
    </div>

    <div>
        <label class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1">Ngày đi (Check-out)</label>
        <input type="text" name="check_out" required placeholder="Chọn ngày đi" 
               onfocus="(this.type='date')" onblur="(this.type='text')"
               class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded focus:outline-none focus:border-gray-900 bg-gray-50/50">
    </div>

    <button type="submit" class="w-full text-center bg-gray-900 text-white font-bold text-xs uppercase tracking-widest py-3.5 px-6 rounded hover:bg-amber-700 transition duration-300 mt-2">
        XÁC NHẬN ĐẶT NGAY
    </button>
</form>
        </div>
    </div>

    <section id="news" class="max-w-[1300px] mx-auto px-4 py-20 border-t border-gray-100">
        <div class="text-center max-w-xl mx-auto mb-16">
            <h2 class="text-2xl font-serif font-bold text-gray-900 tracking-wide uppercase">Tin Tức & Sự Kiện</h2>
            <div class="w-12 h-[2px] bg-amber-700 mx-auto mt-3"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $item)
            <article class="bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="h-52 bg-gray-200 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&q=80');">
                        <span class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-2.5 py-1 rounded text-[10px] font-bold text-gray-800 shadow-sm uppercase tracking-wider">
                            {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') : '2026' }}
                        </span>
                    </div>
                    <a href="{{ route('news.show', $item->id) }}" class="block">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 text-[10px] text-gray-400 mb-3 font-bold uppercase tracking-wider">
                                <span class="text-amber-700 bg-amber-50 px-2 py-0.5 rounded">{{ $item->category ?? 'Sự kiện' }}</span>
                                <span><i class="fa-regular fa-eye"></i> {{ $item->views ?? $item->view }} lượt xem</span>
                            </div>
                            <h3 class="text-base font-serif font-bold text-gray-900 mb-2 hover:text-amber-700 transition line-clamp-2 leading-snug">
                                {{ $item->title }}
                            </h3>
                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-3 font-light">
                                {{ $item->content }}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-gray-50">
                    <a href="{{ route('news.index') }}" class="text-[11px] font-bold text-amber-700 tracking-widest hover:text-gray-900 transition flex items-center gap-1 uppercase">
                        Xem tất cả bài viết <i class="fa-solid fa-arrow-right text-[9px]"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </section>

    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        &copy; 2026 HAT RESORT - Project by Đặng Việt Anh. All rights reserved.
    </footer>

    @if(session('success'))
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full border-4 border-amber-700 mb-4">
                <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            @if(str_contains(session('success'), 'Đăng ký'))
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Đăng Ký Thành Comg!</h2>
            @else
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Đặt Phòng Thành Công!</h2>
            @endif

            <p class="text-gray-600 mb-6">{{ session('success') }}</p>

            <button onclick="this.closest('.fixed').remove()" class="bg-gray-900 text-white font-bold py-2 px-6 rounded hover:bg-amber-700 transition">
                ĐỒNG Ý
            </button>
        </div>
    </div>
    @endif

    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                const icon = btn.querySelector('i');
                if (menu.classList.contains('hidden')) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-xmark');
                }
            });

            const links = menu.querySelectorAll('a');
            links.forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    const icon = btn.querySelector('i');
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                });
            });
        }

        function openBookingModal(roomId, roomNumber) {
            const modal = document.getElementById('booking-modal');
            const content = document.getElementById('modal-content');
            document.getElementById('modal-room-id').value = roomId;
            document.getElementById('modal-room-number').innerText = "Phòng " + roomNumber;
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeBookingModal() {
            const modal = document.getElementById('booking-modal');
            const content = document.getElementById('modal-content');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>
</html>