<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('c_id');
            $table->string('c_name');
            $table->unsignedBigInteger('main_category_id');
            $table->string('c_banner_img')->nullable();
            $table->string('c_image')->nullable();
            $table->text('c_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
