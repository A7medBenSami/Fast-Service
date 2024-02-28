<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('captain_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('from_lat');
            $table->decimal('from_long');
            $table->decimal('to_lat');
            $table->decimal('to_long');
            $table->text('description');
            $table->decimal('cost')->nullable();
            $table
                ->enum('status', ['upcoming','completed','cancelled','receive',])
                ->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('receiver_data_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('sender_data_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};