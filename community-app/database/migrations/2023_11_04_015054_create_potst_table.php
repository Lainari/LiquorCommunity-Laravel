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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['info', 'review', 'bar', 'shop']);
            $table->string('nickname');
            $table->string('title');
            $table->string('content');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->boolean('approve')->default(false); // 관리자 승인 받으면 보이도록
            // 외래키 설정
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
