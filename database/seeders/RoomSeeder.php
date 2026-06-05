<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rooms')->insert([

            [
                'room_number' => 'HN101',
                'type' => 'Căn Hộ Studio Áp Mái',
                'price' => 7500000,
                'description' => 'Tầng thượng, thiết kế áp mái độc đáo, không gian yên tĩnh, lãng mạn. Phù hợp 1-2 người.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN102',
                'type' => 'Modern Minimalist Studio',
                'price' => 5500000,
                'description' => 'Phong cách tối giản, cửa sổ kịch trần, đầy đủ tiện nghi hiện đại.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN103',
                'type' => 'Family Grand Suite',
                'price' => 12000000,
                'description' => '2 phòng ngủ, bếp riêng, ban công thoáng mát. Phù hợp gia đình.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN104',
                'type' => 'Green Garden Apartment',
                'price' => 6800000,
                'description' => 'Ban công rộng nhiều cây xanh, view thoáng, nội thất mây tre đan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN105',
                'type' => 'Premium Executive Flat',
                'price' => 15000000,
                'description' => 'Căn hộ cao cấp, nội thất Ý, hệ thống Smart Home hiện đại.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN106',
                'type' => 'City Center Studio',
                'price' => 9000000,
                'description' => 'Trung tâm phố cổ, tiện ích xung quanh đa dạng, thiết kế trẻ trung.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN107',
                'type' => 'Twin Home Workshop',
                'price' => 6500000,
                'description' => 'Kết hợp ở và làm việc, 2 giường đơn, ánh sáng chuyên dụng.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN108',
                'type' => 'Skyline Penthouse',
                'price' => 25000000,
                'description' => 'View toàn cảnh thành phố, sân vườn riêng, đẳng cấp thượng lưu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN109',
                'type' => 'Standard Student Room',
                'price' => 3500000,
                'description' => 'Giá rẻ, gần các trường đại học, đầy đủ tiện nghi cơ bản.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN110',
                'type' => 'Romantic Nest for Couples',
                'price' => 6000000,
                'description' => 'Tone màu ấm, riêng tư, trang trí theo phong cách Hàn Quốc.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN111',
                'type' => 'Professional Business Suite',
                'price' => 8500000,
                'description' => 'Bàn làm việc lớn, ghế công thái học, cách âm cao cấp.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'room_number' => 'HN112',
                'type' => 'Vintage Indochine Room',
                'price' => 7200000,
                'description' => 'Phong cách Đông Dương, gạch bông cổ điển, nghệ thuật.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}