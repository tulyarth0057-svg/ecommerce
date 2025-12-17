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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('p_id');
            $table->string('p_name');
         $table->unsignedBigInteger('main_category_id'); // NOT NULL by default
            $table->unsignedBigInteger('p_category_id');
            $table->text('p_short_description')->nullable();
            $table->longText('p_long_description')->nullable();
            $table->decimal('p_price', 10, 2)->nullable();
            $table->decimal('p_old_price', 10, 2)->nullable();
            $table->boolean('p_visibility_status')->default(1); // 1 = visible, 0 = invisible
            $table->integer('p_stock')->default(0);
            $table->string('p_type')->nullable();  // e.g. simple/variable/custom
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
