
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('tbl_orders', function (Blueprint $table) {
    $table->unsignedBigInteger('courier_id')->nullable()->after('o_order_status');
    $table->string('delivery_otp', 10)->nullable()->after('courier_id');
});

}

public function down()
{
   Schema::table('tbl_orders', function (Blueprint $table) {
    $table->dropColumn(['courier_id', 'delivery_otp']);
});

}

};