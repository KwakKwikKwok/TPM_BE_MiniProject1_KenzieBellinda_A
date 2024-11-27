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
            $table->foreignId('guest_id')->constrained('guests')->onDelete('cascade'); 
            $table->dateTime('reservation_time'); 
            $table->integer('seats');
            $table->timestamps();
        });
        
    }
    
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
