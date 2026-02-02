
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('tbl_order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('o_i_color_id')
                  ->nullable()
                  ->after('o_i_product_id');

            // optional but recommended
            $table->foreign('o_i_color_id')
                  ->references('color_id')
                  ->on('color')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('tbl_order_items', function (Blueprint $table) {
            $table->dropForeign(['o_i_color_id']);
            $table->dropColumn('o_i_color_id');
        });
    }
};