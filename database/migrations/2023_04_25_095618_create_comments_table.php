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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->bigInteger('user_id');
            $table->string('title');
            $table->bigInteger('food_id')->nullable();
            $table->bigInteger('restaurant_id')->nullable();
            $table->bigInteger('cart_id')->nullable();
            $table->unsignedInteger('score');
            $table->longText('answer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

            Schema::dropIfExists('comments');
    }
};
