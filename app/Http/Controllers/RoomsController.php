<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // 1. Hàm hiển thị form THÊM phòng mới
    public function create() {
        return view('admin.rooms.create');
    }

    // 2. Hàm hiển thị form SỬA phòng
    public function edit($id) {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    // 3. Hàm xử lý XÓA phòng khỏi DB
    public function destroy($id) {
        $room = Room::findOrFail($id);
        $room->delete(); // Xóa khỏi Database
        
        return redirect()->back()->with('success', 'Đã xóa phòng thành công!');
    }
}