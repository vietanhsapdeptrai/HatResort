<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phòng mới - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased min-h-screen flex items-center justify-center py-12 px-4">

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm max-w-lg w-full p-8">
        
        <div class="mb-6 border-b border-gray-200 pb-4">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Thêm phòng</h2>
        </div>

        <form action="{{ route('admin.rooms.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Số phòng</label>
                <input type="text" name="room_number" required placeholder="VD:HN101" 
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:border-gray-900 transition placeholder-gray-300">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Loại phòng</label>
                <div class="relative">
                    <select name="type" required 
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:border-gray-900 transition appearance-none bg-white pr-10">
                        <option value="Căn hộ studio gác mái">Căn hộ studio gác mái</option>
                        <option value="Căn hộ Studio áp mái">Căn hộ Studio áp mái</option>
                        <option value="Family Grand Suite">Family Grand Suite</option>
                        <option value="Modern Minimalist Studio">Modern Minimalist Studio</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                    Thay đổi hình minh họa (Xem trước)
                </label>
                
                <div class="flex space-x-2 mb-2">
                    <button type="button" id="btn-link" onclick="switchUploadMode('link')"
                            class="px-3 py-1 text-xs font-medium rounded transition bg-gray-600 text-white font-bold">
                        Dùng link ảnh
                    </button>
                    <button type="button" id="btn-file" onclick="switchUploadMode('file')"
                            class="px-3 py-1 text-xs font-medium rounded transition bg-gray-200 text-gray-700 hover:bg-gray-300">
                        Chọn ảnh từ PC
                    </button>
                </div>

                <div id="wrapper-link">
                    <input type="url" placeholder="Dán link ảnh mới vào đây để thay đổi" 
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:border-gray-900 transition placeholder-gray-300">
                </div>

                <div id="wrapper-file" class="hidden">
                    <input type="file" accept="image/*"
                           class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded focus:outline-none focus:border-gray-900 transition bg-gray-50 text-gray-500 file:mr-4 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-gray-900 file:text-white hover:file:bg-amber-700 file:cursor-pointer">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Giá phòng (VND)</label>
                <input type="number" name="price" required placeholder="VD:7.500.000,00 đ" 
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:border-gray-900 transition placeholder-gray-300">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Trạng thái</label>
                <div class="relative">
                    <select name="status" required 
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:border-gray-900 transition appearance-none bg-white pr-10">
                        <option value="available">Còn trống</option>
                        <option value="occupied">Đang ở</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Giá phòng (VND)</label> 
                <textarea name="description" rows="4" placeholder="VD: Thiết kế áp mái độc đáo, có hồ bơi, view biển, không gian yên tĩnh."
                          class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:outline-none focus:border-gray-900 transition placeholder-gray-300 resize-none"></textarea>
            </div>

            <div class="flex space-x-3 pt-2">
                <button type="submit" class="w-2/3 bg-black text-white font-bold text-sm py-2.5 rounded hover:bg-amber-700 transition duration-300 shadow-sm uppercase tracking-wider">
                    Thêm
                </button>
                <a href="{{ route('admin.dashboard') }}" class="w-1/3 bg-gray-100 text-gray-800 font-bold text-sm py-2.5 rounded hover:bg-gray-200 transition duration-300 flex items-center justify-center uppercase tracking-wider">
                    Hủy
                </a>
            </div>

        </form>
    </div>

    <script>
        function switchUploadMode(mode) {
            const btnLink = document.getElementById('btn-link');
            const btnFile = document.getElementById('btn-file');
            const wrapperLink = document.getElementById('wrapper-link');
            const wrapperFile = document.getElementById('wrapper-file');

            if (mode === 'link') {
                btnLink.className = "px-3 py-1 text-xs font-medium rounded transition bg-gray-600 text-white font-bold";
                btnFile.className = "px-3 py-1 text-xs font-medium rounded transition bg-gray-200 text-gray-700 hover:bg-gray-300";
                wrapperLink.classList.remove('hidden');
                wrapperFile.classList.add('hidden');
            } else {
                btnLink.className = "px-3 py-1 text-xs font-medium rounded transition bg-gray-200 text-gray-700 hover:bg-gray-300";
                btnFile.className = "px-3 py-1 text-xs font-medium rounded transition bg-gray-600 text-white font-bold";
                wrapperLink.classList.add('hidden');
                wrapperFile.classList.remove('hidden');
            }
        }
    </script>

</body>
</html>