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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number'); // [cite: 121]
            $table->string('type'); // Loại phòng (VIP, Standard...) [cite: 121]
            $table->decimal('price', 15, 2); // [cite: 121]
            $table->text('description')->nullable(); // [cite: 121]
            $table->string('status')->default('available'); // available hoặc booked [cite: 121]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
