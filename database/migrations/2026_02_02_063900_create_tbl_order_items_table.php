<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tbl_order_items', function (Blueprint $table) {
            $table->id('o_i_id'); // primary key
            $table->unsignedBigInteger('o_i_order_id'); // reference to orders table
            $table->unsignedBigInteger('o_i_product_id'); // reference to products table
            $table->string('o_i_product_name'); // product name
            $table->integer('o_i_quantity')->default(1); // quantity
            $table->string('o_i_size')->nullable(); // size if applicable
            $table->decimal('o_i_size_price', 10, 2)->default(0); // price for size option
            $table->decimal('o_i_product_price', 10, 2)->default(0); // product price per unit
            $table->decimal('o_i_total_price', 10, 2)->default(0); // total price for this item
            $table->timestamp('o_i_created_at')->useCurrent();
            $table->timestamp('o_i_updated_at')->useCurrent()->useCurrentOnUpdate();

            // Optional foreign keys (uncomment if related tables exist)
            // $table->foreign('o_i_order_id')->references('order_id')->on('orders')->onDelete('cascade');
            // $table->foreign('o_i_product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_order_items');
    }
};
