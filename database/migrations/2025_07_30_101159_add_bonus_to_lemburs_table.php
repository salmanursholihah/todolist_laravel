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
        Schema::table('lemburs', function (Blueprint $table) {
            $table->integer('bonus')->default(0)->after('bukti'); // Menambahkan kolom 'bonus' setelah kolom 'bukti'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lemburs', function (Blueprint $table) {
            //
        });
    }
};
