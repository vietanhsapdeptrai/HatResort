<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa phòng - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl border shadow-sm mt-10">
        <h2 class="text-lg font-bold mb-6 border-b pb-2 text-gray-900 uppercase tracking-wide">Cập nhật thông tin phòng</h2>
        
        <!-- Action gọi đến route update kèm ID phòng -->
        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- Số phòng -->
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Số phòng</label>
                <input type="text" name="room_number" value="{{ $room->room_number }}" required class="w-full border px-3 py-2 rounded focus:outline-gray-900">
            </div>
            
            <!-- Loại phòng -->
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Loại phòng</label>
                <select name="type" class="w-full border px-3 py-2 rounded focus:outline-gray-900">
                    <option value="Căn hộ Studio áp mái" {{ $room->type == 'Căn hộ Studio áp mái' ? 'selected' : '' }}>Căn hộ Studio áp mái</option>
                    <option value="Modern Minimalist Studio" {{ $room->type == 'Modern Minimalist Studio' ? 'selected' : '' }}>Modern Minimalist Studio</option>
                    <option value="Family Grand Suite" {{ $room->type == 'Family Grand Suite' ? 'selected' : '' }}>Family Grand Suite</option>
                </select>
            </div>
            
            <!-- Giá phòng -->
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Giá phòng (VND)</label>
                <input type="number" name="price" value="{{ $room->price }}" required class="w-full border px-3 py-2 rounded focus:outline-gray-900">
            </div>
            
            <!-- Trạng thái -->
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Trạng thái</label>
                <select name="status" class="w-full border px-3 py-2 rounded focus:outline-gray-900">
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Còn trống</option>
                    <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Đã đặt</option>
                </select>
            </div>
            
            <!-- Mô tả -->
            <div>
                <label class="text-xs font-bold text-gray-500 block mb-1">Mô tả phòng</label>
                <textarea name="description" class="w-full border px-3 py-2 rounded h-24 focus:outline-gray-900">{{ $room->description }}</textarea>
            </div>
            
            <!-- Nút bấm -->
            <div class="flex gap-2 pt-2">
                <button type="submit" class="flex-1 bg-gray-900 text-white font-bold text-xs py-3 rounded hover:bg-amber-700 transition">
                    CẬP NHẬT
                </button>
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-3 bg-gray-100 text-gray-700 font-bold text-xs rounded text-center hover:bg-gray-200 transition">
                    HỦY
                </a>
            </div>
        </form>
    </div>
</body>
</html>