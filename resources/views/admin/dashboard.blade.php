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

    <!-- 1. HEADER CHUẨN MELIA -->
<header class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm relative">
    <div class="max-w-[1400px] mx-auto px-4 py-3 flex justify-between items-center">
        
        <div class="flex items-center space-x-4">
            <button id="admin-mobile-btn" class="text-gray-800 p-1 hover:text-amber-700 transition lg:hidden focus:outline-none">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
            <a href="/admin-custom" class="text-xl font-serif font-bold tracking-widest text-gray-900">
                HAT <span class="text-xs font-sans font-light tracking-normal block text-gray-500 -mt-1">HOTELS & RESORTS</span>
            </a>
        </div>

        <nav class="hidden lg:flex items-center space-x-8 text-xs font-bold uppercase tracking-wider">
    
    <a href="/admin-custom" class="{{ request()->url() === url('admin-custom') ? 'text-amber-700' : 'text-gray-500 hover:text-amber-700' }} transition-colors duration-200">
        Quản Lý Phòng
    </a>
    
    <a href="{{ route('admin.bookings.index') }}" class="{{ request()->is('admin-custom/bookings*') ? 'text-amber-700' : 'text-gray-500 hover:text-amber-700' }} transition-colors duration-200">
        Quản Lý Đặt Phòng
    </a>
    
    <a href="/admin-custom/#news" class="text-gray-500 hover:text-amber-700 transition-colors duration-200">
        Quản Lý Tin Tức
    </a>

</nav>

        <div class="hidden lg:block relative group py-2">
            <button class="flex items-center gap-2 focus:outline-none cursor-pointer">
                <div class="w-8 h-8 rounded-full bg-gray-900 text-white flex items-center justify-center font-bold text-sm uppercase shadow-sm">
                    A
                </div>
                <span class="text-xs font-bold text-gray-700">admin</span>
                <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 group-hover:rotate-180 transition-transform duration-200"></i>
            </button>

            <div class="absolute right-0 top-full w-48 bg-white border border-gray-100 rounded-lg shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 invisible group-hover:visible">
                <div class="px-4 py-2 border-b border-gray-50">
                    <p class="text-xs font-bold text-gray-800">Quản trị viên</p>
                    <p class="text-[10px] text-gray-400 truncate">admin@hatresort.com</p>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2.5 text-xs font-bold text-red-600 hover:bg-red-50 transition uppercase tracking-wider mt-1">
                        <i class="fa-solid fa-arrow-right-from-bracket text-red-400 w-4"></i> Đăng xuất
                    </button>
                </form>
            </div>
        </div>

    </div>

    <div id="admin-mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 absolute top-full left-0 w-full shadow-xl z-50">
        <div class="px-6 py-6 flex flex-col space-y-4 font-bold text-xs uppercase tracking-wider text-gray-700">
            <div class="flex items-center gap-3 pb-3 border-b border-gray-100">
                <div class="w-9 h-9 rounded-full bg-gray-900 text-white flex items-center justify-center font-bold text-sm">A</div>
                <div>
                    <p class="text-xs font-bold text-gray-900">Hệ thống Admin</p>
                    <p class="text-[10px] font-medium text-gray-400 lowercase tracking-normal">admin@hatresort.com</p>
                </div>
            </div>
            
            <a href="/admin-custom" class="text-amber-700 py-2 border-b border-gray-50"><i class="fa-solid fa-bed mr-2"></i> Quản Lý Phòng</a>
            <a href="{{ route('admin.bookings.index') }}" class="hover:text-amber-700 py-2 border-b border-gray-50"><i class="fa-solid fa-receipt mr-2"></i> Quản Lý Đặt Phòng</a>
            <a href="/admin-custom/#news" class="hover:text-amber-700 py-2 border-b border-gray-50"><i class="fa-solid fa-newspaper mr-2"></i> Quản Lý Tin Tức</a>
            
            <form action="{{ route('logout') }}" method="POST" class="pt-2 w-full m-0">
                @csrf
                <button type="submit" class="w-full text-left flex items-center gap-2 py-2 text-red-600 transition">
                    <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> Đăng xuất hệ thống
                </button>
            </form>
        </div>
    </div>
</header>

    <main id="main">
        <!-- 2. HERO IMAGE PANORAMA (Bố cục 3 ảnh tràn viền như Melia) -->
        <div class="relative w-full h-[55vh] md:h-[65vh] flex overflow-hidden bg-gray-200">
            <!-- Ảnh phụ bên trái -->
            <div class="hidden md:block w-[12%] h-full opacity-60 bg-cover bg-center transition duration-500 hover:opacity-80" 
                 style="background-image: url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80');">
            </div>

            <!-- Ảnh chính ở giữa (Hồ bơi vô cực rộng lớn) -->
            <div class="flex-1 h-full bg-cover bg-center relative" 
                 style="background-image: url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=1200&q=80');">
                <!-- Nút liên hệ nổi góc phải dưới -->
                <!-- <button class="absolute bottom-6 right-6 w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center shadow-xl hover:bg-amber-700 transition z-20">
                    <i class="fa-solid fa-phone-volume text-lg"></i>
                </button> -->
            </div>

            <!-- Ảnh phụ bên phải -->
            <div class="hidden md:block w-[12%] h-full opacity-60 bg-cover bg-center transition duration-500 hover:opacity-80" 
                 style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&q=80');">
            </div>
        </div>

        

        <!-- CRUD Phòng nghỉ -->
        <section id="rooms" class="max-w-[1300px] mx-auto px-4 py-20">

    <!-- Thêm phòng -->
    <div class="text-center max-w-xl mx-auto mb-16">
        <h2 class="text-2xl font-serif font-bold text-gray-900 tracking-wide uppercase">Quản Lý Danh Sách Phòng</h2>
        <div class="w-12 h-[2px] bg-amber-700 mx-auto mt-3"></div>
        
        <div class="mt-6">
            <a href="{{ route('admin.rooms.create') }}" class="inline-block bg-gray-900 text-white hover:bg-amber-700 text-[11px] font-bold tracking-widest uppercase py-3.5 px-8 rounded transition duration-300 shadow-sm">
                ➕ Thêm Phòng Nghỉ Mới
            </a>
        </div>
    </div>

    <!-- Thông báo phòng -->
    <div class="max-w-md mx-auto mt-4">
        
        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-md text-xs font-semibold flex items-center justify-center space-x-2 animate-fade-in shadow-sm">
                <span>✅ {{ session('success') }}</span>
            </div>
        @endif

        @if (session('error') || $errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md text-xs font-semibold text-center space-y-1 shadow-sm">
                @if (session('error'))
                    <p>❌ {{ session('error') }}</p>
                @endif
                
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>⚠️ {{ $error }}</p>
                    @endforeach
                @endif
            </div>
        @endif

    </div>

    <!-- Bộ lọc -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-8 max-w-[1300px] mx-auto">
    <form action="/admin-custom" method="GET" class="flex flex-col md:flex-row items-end gap-4">
        
        <div class="flex-1 w-full">
            <label class="text-xs font-bold text-gray-700 block mb-1.5 uppercase tracking-wider">Tìm theo số phòng</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Nhập số phòng cần tìm..." 
                   class="w-full border border-gray-300 px-3 py-2 text-sm rounded focus:outline-gray-950 bg-white">
        </div>

        <div class="w-full md:w-64">
            <label class="text-xs font-bold text-gray-700 block mb-1.5 uppercase tracking-wider">Lọc theo trạng thái</label>
            <select name="status" class="w-full border border-gray-300 px-3 py-2 text-sm rounded focus:outline-gray-950 bg-white">
                <option value="">-- Tất cả trạng thái --</option>
                <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Còn trống</option>
                <option value="booked" {{ request('status') == 'booked' ? 'selected' : '' }}>Đã đặt</option>
            </select>
        </div>

        <div class="flex gap-2 w-full md:w-auto">
            <button type="submit" class="flex-1 md:flex-none bg-gray-950 hover:bg-amber-700 text-white text-xs font-bold tracking-wider uppercase py-2.5 px-6 rounded transition">
                Tìm kiếm
            </button>
            
            @if(request('search') || request('status'))
                <a href="/admin-custom" class="text-center bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-bold tracking-wider uppercase py-2.5 px-4 rounded transition">
                    Xóa bộ lọc
                </a>
            @endif
        </div>

    </form>
</div>

    <!-- Danh sách phòng -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($rooms as $room)
        <div class="bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
            
            <div>
                <div class="h-64 bg-gray-200 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=600&q=80');"></div>
                <div class="p-6 pb-2">
                    <div class="flex justify-between items-start mb-2 gap-2">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                            <span class="text-[10px] font-bold text-amber-700 uppercase tracking-widest block">
                                {{ $room->type }}
                            </span>
                            
                            <span class="inline-block whitespace-nowrap text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded {{ $room->status == 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $room->status == 'available' ? 'Còn trống' : 'Đã đặt' }}
                            </span>
                        </div>

                        <p class="text-lg font-bold text-gray-900 whitespace-nowrap text-right shrink-0">
                            {{ number_format($room->price, 0, ',', '.') }}đ<span class="text-xs font-normal text-gray-400">/đêm</span>
                        </p>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Phòng {{ $room->room_number }}</h3>
                    <p class="text-gray-500 text-xs line-clamp-2 mb-4 leading-relaxed">{{ $room->description }}</p>
                </div>
            </div>

            <div class="px-6 pb-6 pt-3 border-t border-dashed border-gray-100">
                <div class="flex items-center space-x-2 text-[10px] font-bold tracking-wider">
                    
                    <a href="{{ route('admin.rooms.show_admin', $room->id) }}" class="flex-1 text-center py-2.5 border border-gray-200 text-gray-700 rounded hover:border-gray-900 hover:bg-gray-50 transition uppercase">
                        👁️ Xem
                    </a>
                    
                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="flex-1 text-center py-2.5 bg-amber-600 text-white rounded hover:bg-amber-700 transition uppercase">
                        ✏️ Sửa
                    </a>
                    
                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng {{ $room->room_number }} không?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2.5 bg-red-600 text-white rounded hover:bg-red-700 transition uppercase">
                            🗑️ Xóa
                        </button>
                    </form>
                    
                </div>
            </div>

        </div>
        @endforeach
    </div>
</section>
    </main>
    </div>
</div>

    <!-- section hien thi tin tuc -->
    <section id="news" class="max-w-[1300px] mx-auto px-4 py-20 border-t border-gray-100">
        <div class="text-center max-w-xl mx-auto mb-16">
            <h2 class="text-2xl font-serif font-bold text-gray-900 tracking-wide uppercase">Tin Tức & Sự Kiện</h2>
            <p class="text-gray-400 text-xs mt-2 font-light">Cập nhật các hoạt động lễ hội và cẩm nang trải nghiệm tại HAT Resort</p>
            <div class="w-12 h-[2px] bg-amber-700 mx-auto mt-3"></div>
        </div>

        <!-- Button to create new news -->
        <div class="mb-6 text-center">
            <a href="{{ route('admin.news.create') }}" class="inline-block bg-gray-900 text-white hover:bg-amber-700 text-[11px] font-bold tracking-widest uppercase py-3 px-6 rounded transition">
                ➕ Thêm Bài Viết Mới
            </a>
        </div>
        
        <!-- Form lọc và tìm kiếm tin tức -->
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-8 max-w-[1300px] mx-auto">
            <form action="/admin-custom" method="GET" class="flex flex-col md:flex-row items-end gap-4">
                
                <div class="flex-1 w-full">
                    <label class="text-xs font-bold text-gray-700 block mb-1.5 uppercase tracking-wider">Tìm kiếm bài viết</label>
                    <input type="text" name="search_news" value="{{ request('search_news') }}" placeholder="Nhập tiêu đề tin tức cần tìm..." 
                        class="w-full border border-gray-300 px-3 py-2 text-sm rounded focus:outline-gray-950 bg-white">
                </div>

                <div class="w-full md:w-64">
                    <label class="text-xs font-bold text-gray-700 block mb-1.5 uppercase tracking-wider">Lọc theo danh mục</label>
                    <select name="category_news" class="w-full border border-gray-300 px-3 py-2 text-sm rounded focus:outline-gray-950 bg-white">
                        <option value="">-- Tất cả danh mục --</option>
                        <option value="Sự kiện" {{ request('category_news') == 'Sự kiện' ? 'selected' : '' }}>Lễ hội / Sự kiện</option>
                        <option value="Khuyến mãi" {{ request('category_news') == 'Khuyến mãi' ? 'selected' : '' }}>Ẩm thực / Khuyến mãi</option>
                        <option value="Tin resort" {{ request('category_news') == 'Tin resort' ? 'selected' : '' }}>Thông báo resort</option>
                    </select>
                </div>

                <div class="flex gap-2 w-full md:w-auto">
                    <button type="submit" class="flex-1 md:flex-none bg-gray-950 hover:bg-amber-700 text-white text-xs font-bold tracking-wider uppercase py-2.5 px-6 rounded transition">
                        Tìm kiếm
                    </button>
                    
                    @if(request('search_news') || request('category_news'))
                        <a href="/admin-custom" class="text-center bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-bold tracking-wider uppercase py-2.5 px-4 rounded transition">
                            Xóa lọc
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <!-- Thông báo tin tức -->
        <div class="max-w-md mx-auto mt-4">
        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-md text-xs font-semibold flex items-center justify-center space-x-2 animate-fade-in shadow-sm">
                <span>✅ {{ session('success') }}</span>
            </div>
        @endif

        @if (session('error') || $errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md text-xs font-semibold text-center space-y-1 shadow-sm">
                @if (session('error'))
                    <p>❌ {{ session('error') }}</p>
                @endif
                
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>⚠️ {{ $error }}</p>
                    @endforeach
                @endif
            </div>
        @endif
        </div>

        <br>

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
                    <div class="px-6 pb-6 pt-3 border-t border-dashed border-gray-100">
                        <div class="flex items-center space-x-2 text-[10px] font-bold tracking-wider">
                            
                            <a href="{{ route('admin.news.show_admin', $item->id) }}" class="flex-1 text-center py-2.5 border border-gray-200 text-gray-700 rounded hover:border-gray-900 hover:bg-gray-50 transition uppercase">
                                👁️ Xem
                            </a>
                            
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="flex-1 text-center py-2.5 bg-amber-600 text-white rounded hover:bg-amber-700 transition uppercase">
                                ✏️ Sửa
                            </a>
                            
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full py-2.5 bg-red-600 text-white rounded hover:bg-red-700 transition uppercase">
                                    🗑️ Xóa
                                </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </section>
<footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        &copy; 2026 HAT RESORT - Project by Đặng Việt Anh. All rights reserved.
    </footer>

    @if(session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif

    <script>
    // Xử lý bật tắt menu Mobile dành riêng cho trang Admin
    const adminBtn = document.getElementById('admin-mobile-btn');
    const adminMenu = document.getElementById('admin-mobile-menu');

    if (adminBtn && adminMenu) {
        adminBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // Chống nổi bọt sự kiện
            adminMenu.classList.toggle('hidden');
            
            // Đổi icon 3 gạch thành dấu X và ngược lại
            const icon = adminBtn.querySelector('i');
            if (adminMenu.classList.contains('hidden')) {
                icon.className = 'fa-solid fa-bars text-xl';
            } else {
                icon.className = 'fa-solid fa-xmark text-xl';
            }
        });

        // Tự động đóng menu nếu click ra ngoài vùng menu lơ lửng
        document.addEventListener('click', (e) => {
            if (!adminMenu.contains(e.target) && !adminBtn.contains(e.target)) {
                adminMenu.classList.add('hidden');
                const icon = adminBtn.querySelector('i');
                icon.className = 'fa-solid fa-bars text-xl';
            }
        });
    }
</script>

</body>
</html>