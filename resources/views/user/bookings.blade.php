<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng Của Tôi - HAT Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <div class="max-w-5xl mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
            <div>
                <a href="/" class="text-xs font-bold text-amber-700 tracking-widest uppercase mb-1 block hover:text-amber-900 transition">
                    <i class="fa-solid fa-arrow-left"></i> Quay lại trang chủ
                </a>
                <h1 class="text-3xl font-serif font-bold text-gray-900">Lịch Sử Đặt Phòng Cá Nhân</h1>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-500">Khách hàng</p>
                <p class="text-sm font-bold text-gray-800">{{ auth()->user()->name }}</p>
            </div>
        </div>

        @if($bookings->isEmpty())
            <div class="bg-white rounded-lg p-12 text-center border shadow-sm">
                <i class="fa-solid fa-calendar-xmark text-4xl text-gray-300 mb-4 block"></i>
                <p class="text-gray-500 font-medium">Bạn chưa thực hiện đơn đặt phòng nào dưới tên này.</p>
                <a href="/#rooms" class="inline-block mt-4 bg-gray-900 text-white text-xs font-bold uppercase tracking-wider px-6 py-3 rounded hover:bg-amber-700 transition">
                    Khám phá phòng ngay
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($bookings as $booking)
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden flex flex-col lg:flex-row justify-between items-start lg:items-center p-6 gap-6">
                    
                    <div class="flex items-center space-x-4 w-full lg:w-auto">
                        <div class="w-20 h-20 bg-gray-100 rounded-lg bg-cover bg-center hidden sm:block flex-shrink-0" 
                             style="background-image: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=200&q=80');"></div>
                        <div>
                            <span class="text-[10px] font-bold text-amber-700 uppercase tracking-wider block">
                                {{ $booking->room->type ?? 'Hạng phòng Premium' }}
                            </span>
                            <h3 class="text-lg font-bold text-gray-900">
                                Phòng Số: {{ $booking->room->room_number ?? 'N/A' }}
                            </h3>
                            <p class="text-xs text-gray-400 mt-1">
                                Đơn giá: <strong class="text-gray-700">{{ number_format($booking->room->price ?? 0, 0, ',', '.') }}đ</strong> / đêm
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:flex lg:items-center gap-6 text-left w-full lg:w-auto border-t border-b lg:border-none py-4 lg:py-0 border-gray-100">
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">Người đặt</p>
                            <p class="text-sm font-bold text-gray-800 truncate max-w-[120px]">{{ $booking->customer_name }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">Ngày đến (In)</p>
                            <p class="text-xs text-gray-700 font-semibold">
                                <i class="fa-regular fa-calendar text-amber-700 mr-1"></i>
                                {{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') : 'Chưa chọn' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">Ngày đi (Out)</p>
                            <p class="text-xs text-gray-700 font-semibold">
                                <i class="fa-regular fa-calendar text-gray-500 mr-1"></i>
                                {{ $booking->check_out ? \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') : 'Chưa chọn' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">Thời gian gửi đơn</p>
                            <p class="text-xs text-gray-500 font-medium">{{ \Carbon\Carbon::parse($booking->created_at)->format('H:i - d/m/Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between lg:justify-end gap-4 w-full lg:w-auto">
                        <div>
                            @if(empty($booking->status) || $booking->status === 'pending')
                                <span class="px-4 py-2 bg-amber-50 text-amber-700 rounded text-xs font-bold border border-amber-200 block text-center min-w-[110px] shadow-sm">
                                    Chờ Duyệt
                                </span>
                            @elseif($booking->status === 'confirmed')
                                <span class="px-4 py-2 bg-green-50 text-green-700 rounded text-xs font-bold border border-green-200 block text-center min-w-[110px] shadow-sm">
                                    Đã Xác Nhận
                                </span>
                            @else
                                <span class="px-4 py-2 bg-gray-100 text-gray-500 rounded text-xs font-bold block text-center min-w-[110px]">
                                    Đã Hủy
                                </span>
                            @endif
                        </div>

                        @if(empty($booking->status) || $booking->status === 'pending')
                        <div>
                            <form action="{{ url('/my-bookings/' . $booking->id . '/cancel') }}" method="POST" 
                                onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn đặt phòng này không? Hành động này không thể hoàn tác!');" class="m-0 p-0">
                                @csrf
                                
                                <button type="submit" class="px-4 py-2 border border-red-200 text-red-600 rounded text-xs font-bold hover:bg-red-600 hover:text-white transition uppercase tracking-wider shadow-sm flex items-center justify-center cursor-pointer">
                                    Hủy phòng
                                </button>
                            </form>
                        </div>
                        @endif

                    </div>

                </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>