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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('ProductID');
            $table->unsignedSmallInteger('TypeID')->nullable();
            $table->string('Img', 255)->nullable();
            $table->string('Name', 255);
            $table->text('Description')->nullable();
            $table->decimal('Price', 10, 2)->nullable();
            $table->integer('Stock');
            $table->timestamps();

            $table->foreign('TypeID')->references('TypeID')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
