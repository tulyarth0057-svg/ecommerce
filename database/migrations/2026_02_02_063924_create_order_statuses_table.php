
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

            // 🔗 Reference tbl_orders.o_id
            $table->unsignedBigInteger('order_id');

            $table->foreign('order_id')
                ->references('o_id')
                ->on('tbl_orders')
                ->onDelete('cascade');

            // 📦 Order status timeline
            $table->enum('status', [
                'pending',
                'confirmed',
                'processing',
                'shipped',
                'delivered',
                'cancelled'
            ])->index();

            // 🚚 Optional tracking info
            $table->string('tracking_number')->nullable();
            $table->text('notes')->nullable();

            $table->timestamp('o_created_at')->useCurrent();
            $table->timestamp('o_updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
    }
};
