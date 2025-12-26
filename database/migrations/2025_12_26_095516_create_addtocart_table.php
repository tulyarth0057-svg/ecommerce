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

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('p_id'); // product reference
            $table->foreign('p_id')->references('p_id')->on('products')->onDelete('cascade');

               $table->bigIncrements('size_id');  
                $table->bigIncrements('color_id');

            $table->integer('qty')->default(1);   
            $table->decimal('p_price', 10, 2);    

            $table->timestamps();

            // unique constraint to avoid duplicate same product+size+color for user
            $table->unique(['user_id', 'p_id', 'size_id', 'color_id','p_price']);
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
