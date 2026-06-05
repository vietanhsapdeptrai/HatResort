<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức & Ưu Đãi - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- HEADER (Đồng bộ với trang main) -->
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm">
        <div class="max-w-[1400px] mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-xs font-bold text-amber-700 uppercase tracking-wider flex items-center gap-2 hover:opacity-80 transition">
                    <i class="fa-solid fa-arrow-left"></i> Quay lại trang chủ
                </a>
            </div>
            <a href="/" class="text-xl font-serif font-bold tracking-widest text-gray-900">
                HAT <span class="text-xs font-sans font-light tracking-normal block text-gray-500 -mt-1">HOTELS & RESORTS</span>
            </a>
            <div class="w-24"></div> <!-- Giữ cân bằng cho header -->
        </div>
    </header>

    <!-- BANNER TIÊU ĐỀ KHU VỰC TIN TỨC -->
    <section class="bg-gray-900 text-white py-16 text-center bg-cover bg-center relative" style="background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1200&q=80');">
        <div class="max-w-4xl mx-auto px-4">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-400 mb-2 block">Bản tin HAT Resort</span>
            <h1 class="text-3xl md:text-4xl font-serif font-bold tracking-wide">TIN TỨC & ƯU ĐÃI ĐỘC QUYỀN</h1>
            <p class="text-gray-300 text-xs md:text-sm mt-3 max-w-xl mx-auto font-light leading-relaxed">Cập nhật những sự kiện mới nhất, cẩm nang du lịch và các chương trình khuyến mãi thượng lưu dành riêng cho bạn.</p>
        </div>
    </section>

    <!-- DANH SÁCH BÀI VIẾT (Lưới 3 cột) -->
    <main class="max-w-[1300px] mx-auto px-4 py-16">
        @if($news->isEmpty())
            <!-- Trạng thái trống (HCI Error Prevention) -->
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mx-auto mb-4">
                    <i class="fa-regular fa-newspaper text-2xl"></i>
                </div>
                <p class="text-gray-500 text-sm">Hiện tại chưa có tin tức nào được đăng tải.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $item)
                <article class="bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
                    <!-- Chèn vào phần nội dung hiển thị của tin tức -->
                    <div class="flex items-center space-x-4 text-[11px] text-gray-400 mb-2 font-medium uppercase tracking-wider">
                        <span class="text-amber-700 bg-amber-50 px-2 py-0.5 rounded">{{ $item->category }}</span>
                        <span><i class="fa-regular fa-eye"></i> {{ $item->views }} lượt xem</span>
                    </div>
                    <div>
                        <!-- Ảnh đại diện bài viết -->
                        <div class="h-52 bg-gray-200 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&q=80');">
                            <span class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded text-[10px] font-bold text-gray-800 shadow-sm uppercase tracking-wider">
                                {{ $item->created_at ? $item->created_at->format('d/m/Y') : 'Tin mới' }}
                            </span>
                        </div>
                        
                        <!-- Nội dung chữ -->
                        <div class="p-6">
                            <a href="{{ route('news.show', $item->id) }}" class="block">
                                <h2 class="text-lg font-serif font-bold text-gray-900 mb-3 hover:text-amber-700 transition line-clamp-2 leading-snug">
                                    {{ $item->title }}
                                </h2>
                            </a>
                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-3 mb-4">
                                {{ $item->content ?? 'Tóm tắt nội dung bài viết quảng cáo dịch vụ hoặc chương trình ưu đãi trải nghiệm độc quyền tại khuôn viên resort...' }}
                            </p>
                        </div>
                    </div>

                    <!-- Nút đọc chi tiết cố định dưới đáy thẻ -->
                    <div class="px-6 pb-6 border-t border-gray-50 pt-4">
                        <a href="{{ route('news.show', $item->id) }}" class="text-xs font-bold text-amber-700 tracking-widest hover:text-gray-900 transition flex items-center gap-1 uppercase">
                            Đọc bài viết <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        @endif
    </main>

    <!-- FOOTER ĐƠN GIẢN -->
    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        <p>&copy; 2026 HAT RESORT - Project by Đặng Việt Anh. All rights reserved.</p>
    </footer>

</body>
</html>