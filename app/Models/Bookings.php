<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{

    // Thêm dòng này để cho phép Laravel lưu dữ liệu từ form vào Database
        protected $guarded = []; 

        protected $fillable = [
        'room_id',
        'customer_name',
        'customer_phone',
        'check_in',
        'check_out',
        'status',
        'user_id'
    ];

        // Mối quan hệ: Một đơn đặt phòng sẽ thuộc về một phòng nào đó
        // Một đơn đặt phòng sẽ thuộc về một User nhất định
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   // Một đơn đặt phòng thuộc về một Phòng nhất định
    public function room()
    {
        // 🔥 ĐÃ SỬA: Đổi từ Room::class sang Rooms::class để khớp với tên Model của bạn
        return $this->belongsTo(Rooms::class, 'room_id');
    }
}
