<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_access')->default(false);
            $table->foreignId('audio_id')->constrained();
            $table->timestamp('time');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};
