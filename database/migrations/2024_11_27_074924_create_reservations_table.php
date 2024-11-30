<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->references('id')->on('guests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('reservation_time'); 
            $table->integer('seats');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
        
    }
    
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
