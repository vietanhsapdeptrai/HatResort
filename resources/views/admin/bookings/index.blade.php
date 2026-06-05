<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đặt Phòng - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

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
            <a href="/admin-custom/#rooms" class="text-amber-700">Quản Lý Phòng</a>
            <a href="{{ route('admin.bookings.index') }}" class="text-gray-500 hover:text-amber-700">Quản Lý Đặt Phòng</a>
            <a href="/admin-custom/#news" class="text-gray-500 hover:text-amber-700">Quản Lý Tin Tức</a>
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
            
            <form action="{{ route('logout') }}" method="POST" class="pt-2 w-full m-0">
                @csrf
                <button type="submit" class="w-full text-left flex items-center gap-2 py-2 text-red-600 transition">
                    <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> Đăng xuất hệ thống
                </button>
            </form>
        </div>
    </div>
</header>

    <main class="max-w-[1400px] mx-auto px-4 py-10">
        <div class="mb-8">
            <h1 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">Danh Sách Đơn Đặt Phòng Nhanh</h1>
            <div class="w-12 h-[2px] bg-amber-700 mt-2"></div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
    
    <div class="w-full overflow-x-auto scrollbar-thin">
        
        <table class="w-full text-left border-collapse min-w-[800px]"> 
            <thead>
                <tr class="bg-gray-900 text-white text-xs font-bold uppercase tracking-wider">
                    <th class="px-6 py-4 whitespace-nowrap">Khách Hàng</th>
                    <th class="px-6 py-4 whitespace-nowrap">Số Điện Thoại</th>
                    <th class="px-6 py-4 whitespace-nowrap">Phòng Đặt</th>
                    <th class="px-6 py-4 whitespace-nowrap">Ngày Đến (Check-In)</th>
                    <th class="px-6 py-4 whitespace-nowrap">Trạng Thái</th>
                    <th class="px-6 py-4 text-center whitespace-nowrap">Hành Động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm font-medium">
                @foreach($bookings as $booking)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4 font-bold text-gray-800 whitespace-nowrap">{{ $booking->customer_name }}</td>
                    <td class="px-6 py-4 text-gray-600 whitespace-nowrap">{{ $booking->customer_phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-amber-700 font-bold">Phòng {{ $booking->room->room_number ?? 'N/A' }}</span>
                        <span class="text-xs text-gray-400 block">{{ $booking->room->type ?? '' }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-600 whitespace-nowrap">
                        <i class="fa-regular fa-calendar mr-1"></i> 
                        {{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') : 'Chưa chọn' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if(empty($booking->status) || trim($booking->status) === '' || $booking->status === 'pending')
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-xs font-bold border border-amber-200">Chờ Duyệt</span>
                        @elseif($booking->status === 'confirmed')
                            <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-bold border border-green-200">Đã Duyệt</span>
                        @else
                            <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded-full text-xs font-bold">Đã Hủy</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-center whitespace-nowrap">
                        @if(empty($booking->status) || trim($booking->status) === '' || $booking->status === 'pending')
                            <div class="flex items-center justify-center gap-2">
                                <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="bg-gray-900 hover:bg-green-700 text-white font-bold text-[10px] uppercase tracking-wider px-3 py-2 rounded transition shadow-sm cursor-pointer">
                                        <i class="fa-solid fa-check mr-1"></i> Duyệt
                                    </button>
                                </form>
                                <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="m-0 p-0" onsubmit="return confirm('Bạn có chắc chắn muốn từ chối đơn này?');">
                                    @csrf
                                    <button type="submit" class="border border-red-200 text-red-600 hover:bg-red-50 font-bold text-[10px] uppercase tracking-wider px-3 py-2 rounded transition cursor-pointer">
                                        Từ Chối
                                    </button>
                                </form>
                            </div>
                        @else
                            <span class="text-xs text-gray-400 italic font-normal">
                                <i class="fa-solid fa-circle-check text-gray-300 mr-1"></i> Đã xử lý xong
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div> </div>
    </main>
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