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
        Schema::create('dormitory_amenities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dormitory_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('amenity_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dormitory_amenities');
    }
};
