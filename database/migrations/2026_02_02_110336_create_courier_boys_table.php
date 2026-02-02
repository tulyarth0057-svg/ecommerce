<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('courier_boys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile', 10);
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address');
            $table->string('id_type');
            $table->string('id_proof'); // file path
            $table->string('vehicle_type');
            $table->string('vehicle_number');
             $table->string('ifsc_code'); // new field
            $table->string('account_holder_name'); 
            $table->string('vehicle_rc'); // file path
            $table->string('bank_account');
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('courier_boys');
    }
};
