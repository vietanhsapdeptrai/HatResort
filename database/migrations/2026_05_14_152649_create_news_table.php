<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề tin tức
            $table->string('category'); // Thông báo, Ưu đãi [cite: 111, 116]
            $table->text('content'); // Nội dung bài viết [cite: 119]
            $table->string('created_by')->default('Hat Resort'); // [cite: 7]
            $table->integer('views')->default(0); // Theo dõi lượt xem [cite: 119]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
