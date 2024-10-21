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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('PaymentID');
            $table->unsignedInteger('OrderID');
            $table->enum('PaymentMethod', ['credit_card', 'paypal', 'cash_on_delivery']);
            $table->enum('PaymentStatus', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamp('PaymentDate')->useCurrent();
            $table->timestamps();

            $table->foreign('OrderID')->references('OrderID')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
