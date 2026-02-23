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
    Schema::table('catatans', function (Blueprint $table) {
        $table->text('kendala')->nullable()->change();
        $table->text('solusi')->nullable()->change();
        $table->text('target')->nullable()->change();
    });
}

public function down()
{
    Schema::table('catatans', function (Blueprint $table) {
        $table->text('kendala')->nullable(false)->change();
        $table->text('solusi')->nullable(false)->change();
        $table->text('target')->nullable(false)->change();
    });
}
};
