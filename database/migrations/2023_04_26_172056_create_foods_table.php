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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('food_categories_id')->references('id')
                ->on('food_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('marerials')->nullable();
            $table->text('image')->nullable();
            $table->integer('price');
            $table->foreignId('coupon_id')->references('id')
                ->on('coupon')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('food_parties_id')->references('id')
                ->on('food_parties')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('restaurant_id')->references('id')
                ->on('restaurants')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
