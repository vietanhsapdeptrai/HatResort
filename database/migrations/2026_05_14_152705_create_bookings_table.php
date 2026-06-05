<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 
    
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Thêm khóa ngoại liên kết tới bảng users, đặt sau cột room_id
            $table->foreignId('user_id')->nullable()->after('room_id')->constrained('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
