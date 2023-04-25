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
        Schema::create('food_restaurant', function (Blueprint $table) {
            $table->foreignId('food_id')->references('id')->on('foods')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['food_id','restaurant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_restaurant');
    }
};
