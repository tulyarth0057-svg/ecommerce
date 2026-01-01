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
         Schema::create('addtocart', function (Blueprint $table) {

            $table->bigIncrements('cart_id'); // primary key

              $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('p_id');
                $table->unsignedBigInteger('size_id');
                $table->unsignedBigInteger('color_id');
            $table->timestamps();

    
            $table->unique(['user_id', 'p_id', 'size_id', 'color_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addtocart');
    }
};
