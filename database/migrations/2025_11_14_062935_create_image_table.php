<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('img_id');
            $table->unsignedBigInteger('img_color_id')->nullable(); // Foreign key if needed
            $table->string('img_path');
            $table->string('img_alt_text')->nullable();
           $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
