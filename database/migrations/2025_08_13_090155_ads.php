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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->enum('type', ['image', 'video', 'audio', 'popup']);
            $table->enum('placement', ['header', 'sidebar','inline', 'popup','preroll', 'audio']);
            $table->string('media_path')->nullable();
            $table->string('link_url')->nullable(); // click-through
            $table->unsignedInteger('duration')->default(7); // detik untuk rotasi
            $table->unsignedInteger('weight')->default(1); // bobot rotasi server-side
            $table->boolean('autoplay')->default(true);
            $table->boolean('mute')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->json('meta')->nullable(); // ukuran, aspect, dsb.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
