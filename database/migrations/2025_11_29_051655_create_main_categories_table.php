<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id('cat_id');
            $table->string('cat_name');
            $table->tinyInteger('status')->default(1); // active = 1, inactive = 0
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('main_categories');
    }
};
