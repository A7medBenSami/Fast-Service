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
        Schema::create('our_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('about_us');
            $table->text('privacy_policy');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->text('help_and_support');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_data');
    }
};
