<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('captains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->string('vehicle_number')->unique();
            $table->string('license_image');
            $table->string('vehicle_catalog_image');
            $table->string('birth_certificate_image');
            $table->enum('status', ['active', 'inactive', 'in_hold'])->default('inactive')->nullable();
            $table->decimal('lat')->nullable();
            $table->decimal('long')->nullable();
            $table->unsignedBigInteger('vehicle_id');
            $table->string('image')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone')->unique();
            $table->string('otp')->unique()->nullable();
            $table->integer('isVerified')->default(0)->nullable();
            $table->integer('dis_percentage')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('captains');
    }
};