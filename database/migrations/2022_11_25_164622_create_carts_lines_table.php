<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts-lines', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->boolean('active');
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('units');
            $table->decimal('total_price');
            $table->decimal('total_price_per_numeric');
            $table->decimal('total_price_price');
            $table->decimal('total_tax');
            $table->decimal('total_tax_per_unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts-lines');
    }
};
