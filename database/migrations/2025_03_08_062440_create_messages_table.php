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
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // ہر پیغام کا ایک unique ID ہوگا
        $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // بھیجنے والا صارف
        $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // وصول کرنے والا صارف
        $table->text('message'); // پیغام کا مواد
        $table->timestamps(); // پیغام کب بھیجا گیا
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }








};
