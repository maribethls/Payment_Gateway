<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('product_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->tinyInteger('rating');

            // Define foreign key constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
            // You might want to add a foreign key constraint for user_id as well
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('rating')->references('rate')->on('product_reviews')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_ratings');
    }
}
