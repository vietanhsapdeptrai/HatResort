<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ĐỂ SỬA LỖI HASFACTORY
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    // Khai báo tên bảng chuẩn trong DB
    protected $table = 'rooms';

    // Chỉ dùng fillable, bỏ hẳn guarded đi để tránh xung đột
    protected $fillable = [
        'room_number',
        'type',
        'price',
        'status',
        'description',
    ];

    // Mối quan hệ với bảng Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id');
    }
}