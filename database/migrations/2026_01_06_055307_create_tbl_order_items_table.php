<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_order_items', function (Blueprint $table) {
            $table->id('o_i_id');
            $table->unsignedBigInteger('o_i_order_id')->index();
            $table->unsignedBigInteger('o_i_product_id')->index();
            $table->string('o_i_product_name');
            $table->integer('o_i_quantity');
            $table->string('o_i_size')->nullable();
            $table->decimal('o_i_size_price', 8, 2)->default(0.00);
            $table->decimal('o_i_product_price', 8, 2);
            $table->decimal('o_i_total_price', 10, 2);
            $table->timestamp('o_i_created_at')->useCurrent();
            $table->timestamp('o_i_updated_at')->useCurrent()->useCurrentOnUpdate();

            // Foreign key constraint
            $table->foreign('o_i_order_id')
                  ->references('o_id')
                  ->on('tbl_orders')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_order_items');
    }
};