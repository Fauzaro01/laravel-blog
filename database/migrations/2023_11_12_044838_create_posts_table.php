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
            $table->string('id', 24)->primary();
            $table->string('title', 255);
            $table->text('content');
            $table->string('user_id', 13);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->text('image_url')->default(false);
            $table->timestamps();
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
