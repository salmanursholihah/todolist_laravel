<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('status_langganan')->default('nonaktif');
        $table->dateTime('tanggal_expired')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
 
public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['status_langganan', 'tanggal_expired']);
    });
}

};
