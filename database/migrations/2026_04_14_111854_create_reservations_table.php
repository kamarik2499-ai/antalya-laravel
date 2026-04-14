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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 32);
            $table->date('date');
            $table->time('time');
            $table->unsignedTinyInteger('guests');
            $table->text('note')->nullable();
            $table->enum('status', ['new', 'confirmed', 'completed', 'cancelled'])->default('new');
            $table->timestamps();

            $table->index(['status', 'date', 'time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
