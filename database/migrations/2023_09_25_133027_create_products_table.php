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
            $table->id();
            $table->string('product_code', 18);
            $table->string('product_name', 30);
            $table->string('image')->nullable();
            $table->string('currency', 5);
            $table->string('price');
            $table->string('discount', 6)->nullable();
            $table->string('discount_price')->nullable();
            $table->string('dimension', 30)->nullable();
            $table->foreignId('product_unit_id');
            $table->foreignId('product_type_id');
            $table->timestamps();
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
