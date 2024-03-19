<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkout_sections', function (Blueprint $table) {
            $table->id();
            $table->string('main_heading')->nullable();
            $table->longText('description')->nullbale();
            $table->longText('images')->nullable();
            $table->string('city_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_sections');
    }
};
