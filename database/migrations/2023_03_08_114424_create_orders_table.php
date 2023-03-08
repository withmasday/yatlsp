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
        // product_id int
        // user_id int
        // fullname int
        // address int
        // poscode int
        // count int
        // price int
        // note text
        // is_confirmed boolean
        // is_viewed boolean
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('fullname');
            $table->string('address');
            $table->integer('poscode');
            $table->integer('count');
            $table->bigInteger('price');
            $table->text('note')->nullable();
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('is_viewed')->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
