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
        Schema::create('arrives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('captain_id');
            $table->decimal('from_at');
            $table->decimal('from_long');
            $table->decimal('to_lat');
            $table->decimal('to_long');
            $table->text('note')->nullable();
            $table->decimal('cost')->nullable();
            $table->enum('status', ['upcoming', 'completed', 'cancelled']);
            $table->unsignedBigInteger('vehicle_id');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('address_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrives');
    }
};
