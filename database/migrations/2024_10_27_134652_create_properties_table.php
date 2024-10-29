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
            $table->string('building_name');
            $table->string('address');
            $table->string('tower_name');
            $table->integer('floor_number');
            $table->integer('flat_number');
            $table->enum('flat_type', ['2bhk', '3bhk', '4bhk']);
            $table->string('size');
            $table->enum('status', ['soldout', 'unsold']);
            $table->timestamps();
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
