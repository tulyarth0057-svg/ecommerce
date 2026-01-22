<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();

            // foreign key to tbl_orders.o_id
            $table->unsignedBigInteger('order_id');
            
            // status values
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');

            // timestamp for each status update
            $table->timestamp('updated_at')->useCurrent();

            // foreign key constraint
            $table->foreign('order_id')
                  ->references('o_id')
                  ->on('tbl_orders')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
    }
};
