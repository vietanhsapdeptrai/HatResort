<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa tin tức - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl border shadow-sm mt-10">
        <h2 class="text-lg font-bold mb-6 border-b pb-2 text-gray-900 uppercase tracking-wide">Chỉnh sửa tin tức</h2>
        
        <form action="{{ route('admin.news.update', $article->id) }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Tiêu đề tin tức</label>
                <input type="text" name="title" value="{{ $article->title }}" required class="w-full border border-gray-200 px-3 py-2 rounded focus:outline-gray-900 text-sm">
            </div>
            
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Danh mục bài viết</label>
                <select name="category" class="w-full border border-gray-200 px-3 py-2 rounded focus:outline-gray-900 text-sm bg-white">
                    <option value="Sự kiện" {{ $article->category == 'Sự kiện' ? 'selected' : '' }}>Lễ hội / Sự kiện</option>
                    <option value="Khuyến mãi" {{ $article->category == 'Khuyến mãi' ? 'selected' : '' }}>Ẩm thực / Khuyến mãi</option>
                    <option value="Tin resort" {{ $article->category == 'Tin resort' ? 'selected' : '' }}>Thông báo resort</option>
                </select>
            </div>
            
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Nội dung chi tiết</label>
                <textarea name="content" required class="w-full border border-gray-200 px-3 py-2 rounded h-48 focus:outline-gray-900 text-sm leading-relaxed">{{ $article->content }}</textarea>
            </div>
            
            <div class="flex gap-2 pt-2">
                <button type="submit" class="flex-1 bg-gray-900 text-white font-bold text-xs py-3 rounded hover:bg-amber-700 transition uppercase tracking-wider">
                    Cập nhật bài viết
                </button>
                <a href="/admin-custom" class="px-5 py-3 bg-gray-100 text-gray-700 font-bold text-xs rounded text-center hover:bg-gray-200 transition uppercase tracking-wider">
                    Hủy
                </a>
            </div>
        </form>
    </div>
    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        &copy; 2026 HAT RESORT - Project by Đặng Việt Anh. All rights reserved.
    </footer>
</body>
</html>