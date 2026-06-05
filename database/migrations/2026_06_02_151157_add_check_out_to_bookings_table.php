<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; // 🔥 Đảm bảo có dòng import này ở đầu file

return new class extends Migration
{
    public function up(): void
    {
        // 🔥 ĐÃ SỬA: Phải là Schema::table chứ không phải Route::table
        Schema::table('bookings', function (Blueprint $table) {
            $table->date('check_out')->nullable()->after('check_in');
        });
    }

    public function down(): void
    {
        // 🔥 ĐÃ SỬA: Phải là Schema::table
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('check_out');
        });
    }
};