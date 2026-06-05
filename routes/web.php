<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - HAT RESORT SYSTEM
|--------------------------------------------------------------------------
*/

// --- CÁC ROUTE CÔNG KHAI (AI CŨNG TRUY CẬP ĐƯỢC) ---

// Trang chủ hiển thị danh sách phòng
Route::get('/', [ClientController::class, 'index'])->name('main');

// Chi tiết phòng khách xem công khai
Route::get('/room/{slug}', [ClientController::class, 'show'])->name('room.show');

// Đường dẫn danh sách tin tức độc lập và chi tiết tin tức
Route::get('/news', [ClientController::class, 'news'])->name('news.index');
Route::get('/news/{id}', [ClientController::class, 'showNews'])->name('news.show');

// Đăng ký tài khoản khách hàng
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Đăng nhập chung cho cả User và Admin
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Xử lý Đăng xuất (Chỉ khai báo 1 lần duy nhất ở đây)
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');


// --- 🟢 PHẦN CỦA KHÁCH HÀNG (CUSTOMER) ---
// Yêu cầu: Phải đăng nhập (auth) VÀ phải là tài khoản khách (isCustomer)
Route::middleware(['auth', 'isCustomer'])->group(function () {
    
    // Xử lý hành động đặt phòng từ trang chủ
    Route::post('/booking', [ClientController::class, 'storeBooking'])->name('booking.store');

    // Xem danh sách phòng đã đặt cá nhân
    Route::get('/my-bookings', [ClientController::class, 'myBookings'])->name('user.bookings');
    
    // 🔥 ĐÃ SỬA: Chuyển về POST để ăn khớp hoàn toàn với thẻ <form method="POST"> ngoài giao diện Blade của khách
    Route::post('/my-bookings/{id}/cancel', [ClientController::class, 'cancelBooking'])->name('user.bookings.cancel');

    // Quản lý sửa đổi thông tin cá nhân khách hàng
    Route::get('/profile', [ClientController::class, 'editProfile'])->name('user.profile');
    Route::post('/profile', [ClientController::class, 'updateProfile'])->name('user.profile.update');
});


// --- 🔴 PHẦN CỦA HỆ THỐNG QUẢN TRỊ (ADMIN CUD) ---
// Yêu cầu: Phải đăng nhập (auth) VÀ phải có quyền quản trị (isAdmin)
Route::prefix('admin-custom')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    
    // Trang chủ quản trị (Dashboard liệt kê phòng)
    Route::get('/', [ClientController::class, 'adminDashboard'])->name('dashboard');

    // --- QUẢN LÝ ĐƠN ĐẶT PHÒNG ---
    Route::get('/bookings', [ClientController::class, 'adminBookings'])->name('bookings.index');
    Route::post('/bookings/{id}/approve', [ClientController::class, 'approveBooking'])->name('bookings.approve');
    Route::post('/bookings/{id}/reject', [ClientController::class, 'rejectBooking'])->name('bookings.reject');

    // --- CRUD QUẢN LÝ PHÒNG (ROOMS) ---
    Route::get('/rooms/{id}/show', [ClientController::class, 'showRoomAdmin'])->name('rooms.show_admin');    
    Route::prefix('rooms')->name('rooms.')->group(function () {
        Route::get('/create', [ClientController::class, 'createRoom'])->name('create');
        Route::post('/store', [ClientController::class, 'storeRoom'])->name('store');
        Route::get('/{id}/edit', [ClientController::class, 'editRoom'])->name('edit');
        Route::post('/{id}/update', [ClientController::class, 'updateRoom'])->name('update');
        Route::delete('/{id}', [ClientController::class, 'deleteRoom'])->name('destroy');
    });

    // --- CRUD QUẢN LÝ TIN TỨC (NEWS) ---
    Route::get('/news/create', [ClientController::class, 'createNew'])->name('news.create');
    Route::post('/news/store', [ClientController::class, 'storeNew'])->name('news.store');
    Route::get('/news/{id}/show', [ClientController::class, 'showNewAdmin'])->name('news.show_admin');
    Route::get('/news/{id}/edit', [ClientController::class, 'editNew'])->name('news.edit');
    Route::post('/news/{id}/update', [ClientController::class, 'updateNew'])->name('news.update');
    Route::delete('/news/{id}', [ClientController::class, 'deleteNew'])->name('news.destroy');
});