<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    // Gọi NewsSeeder để hệ thống chạy seeder tạo dữ liệu tin tức
    $this->call([
        NewsSeeder::class,
    ]);

    $this->call([
        RoomSeeder::class,
    ]);
}
}
