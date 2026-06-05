<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('news.index') }}" class="text-xs font-bold text-amber-700 uppercase tracking-widest flex items-center gap-2 hover:opacity-80 transition">
                <i class="fa-solid fa-arrow-left"></i> Tất cả tin tức
            </a>
            <a href="/" class="text-xl font-serif font-bold tracking-widest text-gray-900">
                HAT <span class="text-xs font-sans font-light tracking-normal block text-gray-500 -mt-1">HOTELS & RESORTS</span>
            </a>
            <div class="w-24"></div>
        </div>
    </header>

    <main class="max-w-[800px] mx-auto px-4 py-16">
        <article>
            <div class="flex items-center space-x-4 text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">
                <span class="text-amber-700 bg-amber-50 px-2.5 py-1 rounded-md">{{ $article->category ?? 'Tin tức' }}</span>
                <span>{{ $article->created_at ? \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') : '2026' }}</span>
                <span><i class="fa-regular fa-eye"></i> {{ $article->views }} lượt xem</span>
            </div>

            <h1 class="text-2xl md:text-4xl font-serif font-bold text-gray-900 tracking-tight leading-tight mb-8">
                {{ $article->title }}
            </h1>

            <div class="w-full h-[400px] bg-gray-200 rounded-2xl overflow-hidden shadow-sm mb-10">
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1200&q=80');"></div>
            </div>

            <div class="text-gray-700 text-sm md:text-base leading-relaxed font-light space-y-6 whitespace-pre-line">
                {{ $article->content }}
            </div>

            <div class="mt-12 pt-6 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                <div>
                    <span>Biên tập bởi: <strong>{{ $article->created_by ?? 'Ban Truyền Thông' }}</strong></span>
                </div>
                <div class="flex space-x-3 text-sm text-gray-400">
                    <a href="#" class="hover:text-amber-700 transition"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="hover:text-amber-700 transition"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="hover:text-amber-700 transition"><i class="fa-solid fa-link"></i></a>
                </div>
            </div>
        </article>
    </main>

    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        <p>&copy; 2026 HAT Resort & Hotels. Bản quyền thuộc về Đặng Việt Anh.</p>
    </footer>

</body>
</html>