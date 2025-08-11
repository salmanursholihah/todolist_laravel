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
      Schema::create('subscriptions', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('plan_id');
    $table->string('order_id')->unique();
    $table->string('transaction_id')->nullable();
    $table->integer('amount');
    $table->enum('status', ['pending','success','expired','cancel','failed'])->default('pending');
    $table->timestamp('paid_at')->nullable();
    $table->timestamp('expires_at')->nullable();
    $table->json('raw_response')->nullable();
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
