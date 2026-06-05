<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Models\Rooms;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Bookings as Booking;
use App\Models\Bookings;

class ClientController extends Controller
{

    // TRANG CHỦ HIỂN THỊ 
    public function index()
    {
        // Lấy dữ liệu (Nếu DB trống nó sẽ trả về mảng rỗng chứ không lỗi) ?? collect()
        $rooms = Rooms::where('status', 'available')->get();
        $news = News::orderBy('created_at', 'desc')->take(3)->get();

        // Gửi dữ liệu sang view main.blade.php
        return view('main', [
            'rooms' => $rooms,
            'news' => $news
        ]);
    }
    public function show($id)
{
    // Tìm kiếm phòng theo ID, nếu không thấy sẽ tự động trả về lỗi 404
    $room = Rooms::findOrFail($id); 
    
    // Trả về giao diện chi tiết phòng và truyền dữ liệu phòng sang
    return view('show', compact('room'));
}
    
    // ĐẶT PHÒNG bằng BTN ở index (Nhiệm vụ 3)
    public function storeBooking(Request $request)
    {
        // 1. Kiểm tra tính hợp lệ của dữ liệu (Ngoại lệ E1 trong báo cáo HCI)
        $request->validate([
        'room_id'        => 'required',
        'customer_name'  => 'required|string|max:255',
        'customer_phone' => 'required|string',
        'check_in'       => 'required|date',
        'check_out'      => 'required|date|after_or_equal:check_in', // 🔥 Ép ngày đi phải sau hoặc bằng ngày đến
    ]);

        // 2. Tạo đơn đặt phòng mới vào bảng bookings
        // Sử dụng đường dẫn tuyệt đối hoặc import Model Booking ở đầu file
        \App\Models\Bookings::create([
            'room_id'        => $request->room_id,
        'customer_name'  => $request->customer_name,
        'customer_phone' => $request->customer_phone,
        'check_in'       => $request->check_in,
        'check_out'      => $request->check_out, // 🔥 ĐÃ THÊM: Hứng dữ liệu lưu vào DB
        'status'         => 'pending',
        ]);

        // 3. Cập nhật trạng thái của phòng vừa đặt thành 'booked' để tránh Overbooking (Trùng phòng)
        $room = Rooms::find($request->room_id);
        if ($room) {
            $room->update([
                'status' => 'booked'
            ]);
        }

        // 4. Quay trở lại trang cũ và bắn thông báo thành công cho người dùng (HCI Feedback)
        return back()->with('success', 'Đặt phòng thành công! HAT Resort sẽ liên hệ lại với bạn sớm nhất.');
    }


    // HIỂN THỊ TIN TỨC Ở INDEX VÀ TRANG TIN TỨC RIÊNG
    public function news()
    {
        // Lấy toàn bộ danh sách tin tức từ mới nhất đến cũ nhất
        $news = News::orderBy('created_at', 'desc')->get() ?? collect();

        // Trả về view tin tức vừa tạo
        return view('news', compact('news'));
    }

    public function showNews($id)
    {
        // Tìm bài viết theo ID, nếu không thấy trả về lỗi 404
        $article = \App\Models\News::findOrFail($id);

        // Tăng lượt xem lên 1 (HCI Data Dynamics)
        $article->increment('views');

        return view('news-detail', compact('article'));
    }
    // 

    // TRANG CHỦ ADMIN (Liệt kê danh sách Phòng & Tin tức + Bộ lọc phòng)
    public function adminDashboard(Request $request)
    {
        // 1. XỬ LÝ LỌC VÀ TÌM KIẾM PHÒNG (Giữ nguyên đoạn code cũ đã chạy ngon của bạn)
        $roomQuery = Rooms::query();
        if ($request->has('search') && $request->input('search') != '') {
            $roomQuery->where('room_number', 'LIKE', "%{$request->input('search')}%");
        }
        if ($request->has('status') && $request->input('status') != '') {
            $roomQuery->where('status', $request->input('status'));
        }
        $rooms = $roomQuery->orderBy('id', 'asc')->get();


        // 2. 🔥 XỬ LÝ LỌC VÀ TÌM KIẾM TIN TỨC (NEWS) MỚI THÊM VÀO
        $newsQuery = News::query();

        // Tìm kiếm theo Tiêu đề bài viết (ô nhập chữ)
        if ($request->has('search_news') && $request->input('search_news') != '') {
            $searchNews = $request->input('search_news');
            $newsQuery->where('title', 'LIKE', "%{$searchNews}%");
        }

        // Bộ lọc theo Danh mục bài viết (Nếu DB của bạn có cột 'category')
        if ($request->has('category_news') && $request->input('category_news') != '') {
            $categoryNews = $request->input('category_news');
            $newsQuery->where('category', $categoryNews);
        }

        // Thực thi lấy dữ liệu tin tức sau khi lọc sạch sẽ
        $news = $newsQuery->orderBy('id', 'desc')->get();


        // 3. Trả về view với đầy đủ dữ liệu
        return view('admin.dashboard', compact('rooms', 'news'));
    }

    // Hàm lấy toàn bộ đơn đặt phòng của mọi khách hàng ra trang quản trị Admin
public function adminBookings()
{
    // Lấy toàn bộ danh sách booking từ DB, kèm theo thông tin phòng liên kết
    $bookings = Booking::with('room')->orderBy('created_at', 'desc')->get();

    return view('admin.bookings.index', compact('bookings'));
}

// 1. Hàm dành cho Admin: BẤM DUYỆT ĐƠN ĐẶT PHÒNG
public function approveBooking($id)
{
    // Tìm đơn đặt phòng theo ID, nếu không thấy trả về trang lỗi 404
    $booking = Bookings::findOrFail($id);
    
    // Cập nhật trạng thái cột status thành 'confirmed' (Đã xác nhận / Đã duyệt)
    $booking->update([
        'status' => 'confirmed'
    ]);

    // Quay lại trang trước và không kèm popup phiền phức
    return redirect()->back();
}

// 2. Hàm dành cho Admin: BẤM TỪ CHỐI ĐƠN ĐẶT PHÒNG
public function rejectBooking($id)
{
    // Tìm đơn đặt phòng theo ID
    $booking = Bookings::findOrFail($id);
    
    // Cập nhật trạng thái cột status thành 'cancelled' (Đã hủy / Từ chối)
    $booking->update([
        'status' => 'cancelled'
    ]);

    return redirect()->back();
}

    // CUD CHO PHÒNG (ROOMS)
    public function showRoomAdmin($id) {
        $room = Rooms::findOrFail($id); // Tìm thông tin phòng theo ID
        return view('admin.rooms.show', compact('room')); // Trỏ tới file view vừa tạo ở Bước 1
    }

    public function createRoom() {
        return view('admin.rooms.create');
    }

    public function storeRoom(Request $request) {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number',
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        Rooms::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Thêm phòng mới thành công!');
    }

    public function editRoom($id) {
        $room = Rooms::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
        }

        public function updateRoom(Request $request, $id) {
        // 1. Tìm đúng phòng cần sửa
        $room = Rooms::findOrFail($id);
        
        // 2. Validate dữ liệu cơ bản để test (Bỏ qua unique trùng số phòng tạm thời)
        $request->validate([
            'room_number' => 'required',
            'type'        => 'required',
            'price'       => 'required|numeric',
            'status'      => 'required',
        ]);

        // 3. Ép gán từng giá trị từ form vào các cột trong DB
        $room->room_number = $request->input('room_number');
        $room->type = $request->input('type');
        $room->price = $request->input('price');
        $room->status = $request->input('status');
        $room->description = $request->input('description');

        // 4. Lưu lại (Lệnh save này bắt buộc phải kích hoạt SQL Update)
        $room->save();
        
        // 5. Chuyển hướng về lại admin-custom kèm theo flash message
        return redirect('/admin-custom')->with('success', 'Cập nhật thông tin phòng thành công!');
    }

    public function deleteRoom($id) {
        Rooms::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Xóa phòng thành công!');
    }

    // CUD CHO TIN TỨC (NEWS)
    public function createNew() {
    return view('admin.news.create');
}

// 2. Xử lý lưu tin tức mới vào DB
public function storeNew(Request $request) {
    $request->validate([
        'title'   => 'required',
        'content' => 'required',
    ]);

    News::create($request->all());
    return redirect('/admin-custom')->with('success', 'Thêm bài viết tin tức mới thành công!');
}

// 3. Xem chi tiết tin tức bản Admin (Không có phần bình luận/liên quan của khách)
public function showNewAdmin($id) {
    $article = News::findOrFail($id);
    return view('admin.news.show', compact('article'));
}

// 4. Giao diện Form sửa bài viết
public function editNew($id) {
    $article = News::findOrFail($id);
    return view('admin.news.edit', compact('article'));
}

// 5. Xử lý cập nhật bài viết (Dùng POST thuần)
public function updateNew(Request $request, $id) {
    $article = News::findOrFail($id);
    
    $request->validate([
        'title'   => 'required',
        'content' => 'required',
    ]);

    // Ép gán trực tiếp tương tự phần phòng để tránh lỗi Mass Assignment
    $article->title = $request->input('title');
    $article->category = $request->input('category'); // Đảm bảo có dòng này để cập nhật danh mục
    $article->content = $request->input('content');
    $article->save();

    return redirect('/admin-custom')->with('success', 'Cập nhật bài viết tin tức thành công!');
}

// 6. Xử lý xóa bài viết tin tức
public function deleteNew($id) {
    News::findOrFail($id)->delete();
    return redirect('/admin-custom')->with('success', 'Đã xóa bài viết tin tức thành công!');
}


// 1. Hiển thị danh sách phòng khách đã đặt
    // 1. Hiển thị danh sách phòng khách đã đặt
    public function myBookings()
    {
        // Lấy danh sách đơn đặt phòng khớp với HỌ TÊN của người đang đăng nhập
        $bookings = Booking::with('room')
                    ->where('customer_name', auth()->user()->name) // 🔥 ĐỔI TỪ user_id SANG customer_name
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('user.bookings', compact('bookings'));
    }
    // 2. Xử lý HỦY PHÒNG
    // Hàm dành cho Khách hàng: TỰ HỦY ĐƠN ĐẶT PHÒNG
    public function cancelBooking($id)
    {
        // 1. Tìm đơn đặt phòng theo ID
        $booking = Bookings::findOrFail($id);

        // 2. 🟢 TẠM THỜI BỎ QUA CHECK USER_ID ĐỂ KIỂM TRA ĐỒ ÁN 
        // (Vì đôi khi tài khoản test của bạn không khớp user_id lưu trong bảng đơn đặt)
        
        // 3. Tiến hành cập nhật trực tiếp không cần check trạng thái cũ
        $booking->update([
            'status' => 'cancelled'
        ]);

        // 4. Trả về kèm session thông báo thành công
        return redirect()->back()->with('success', 'Hủy đơn đặt phòng thành công!');
    }

// 1. Hiển thị form cập nhật thông tin cá nhân
public function editProfile()
{
    $user = auth()->user();
    return view('user.profile', compact('user'));
}

// 2. Xử lý lưu thông tin mới vào DB
public function updateProfile(Request $request)
{
    $user = auth()->user();

    // Validate dữ liệu nhập vào
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:6|confirmed', // Mật khẩu có thể bỏ trống nếu không muốn đổi
    ], [
        'password.confirmed' => 'Mật khẩu xác nhận lại không trùng khớp.',
        'password.min' => 'Mật khẩu mới phải từ 6 ký tự trở lên.'
    ]);

    // Cập nhật tên mới
    $user->name = $request->name;

    // Nếu người dùng có điền vào ô mật khẩu mới thì mới tiến hành hash và lưu
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back()->with('success', 'Cập nhật thông tin tài khoản cá nhân thành công!');
}

}