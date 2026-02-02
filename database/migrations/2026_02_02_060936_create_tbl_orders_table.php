<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->id('o_id');
            $table->unsignedBigInteger('o_user_id')->index();
            $table->string('o_order_number')->unique()->index();
            $table->string('o_email');
            $table->string('o_name');
            $table->text('o_street_address');
            $table->string('o_city');
            $table->string('o_postcode');
            $table->string('o_state')->nullable();
            $table->string('o_phone');
            $table->text('o_order_notes')->nullable();
            $table->decimal('o_subtotal', 10, 2);
            $table->decimal('o_shipping_cost', 10, 2)->default(0.00);
            $table->decimal('o_total_amount', 10, 2);
            $table->enum('o_payment_method', ['cash', 'online'])->default('cash');
            $table->enum('o_payment_status', ['pending', 'paid', 'failed'])->default('pending');
           $table->enum('o_order_status', ['pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending')->index();
            $table->string('o_razorpay_order_id')->nullable();
            $table->string('o_razorpay_payment_id')->nullable();
            $table->string('o_razorpay_signature')->nullable();
            $table->decimal('o_latitude', 10, 7)->nullable();
            $table->decimal('o_longitude', 10, 7)->nullable();
            $table->timestamp('o_created_at')->useCurrent();
            $table->timestamp('o_updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_orders');
    }
};