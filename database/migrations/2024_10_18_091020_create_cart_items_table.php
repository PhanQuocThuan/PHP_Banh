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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('CartItemID');
            $table->unsignedInteger('CartID');
            $table->unsignedInteger('ProductID');
            $table->integer('Quantity');
            $table->decimal('UnitPrice', 10, 2);
            $table->timestamps();

            $table->foreign('CartID')->references('CartID')->on('carts')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
