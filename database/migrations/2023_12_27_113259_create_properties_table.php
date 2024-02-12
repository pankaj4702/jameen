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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_category');
            $table->string('property_name');
            $table->longText('property_location');
            $table->integer('property_status');
            $table->integer('property_source');
            $table->integer('area');
            $table->longText('description');
            $table->integer('price');
            $table->integer('pin_code');
            $table->string('images');
            $table->string('configuration');
            $table->string('features');
            $table->string('feature_image');
            $table->string('post_user');
            $table->integer('category_status');
            $table->timestamps();
            $table->foreign('property_category')
            ->references('id')->on('property_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
