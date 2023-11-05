<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            // $table->foreignId('product_id')->references('id')->on('products'); // Commented out the reference to the products table
            $table->integer('quantity');
            $table->decimal('unit_price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('basket');
    }
};
