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
        Schema::create('color', function (Blueprint $table) {
            $table->bigIncrements('color_id');
            $table->unsignedBigInteger('color_product_id'); // product id
            $table->string('color_name');
            $table->decimal('color_price_adjustment', 10, 2)->nullable(); // extra price
            $table->string('color_code')->nullable(); // hex code
            $table->string('color_image')->nullable(); // image path or URL
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color');
    }
};
