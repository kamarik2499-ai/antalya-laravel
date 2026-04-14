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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone', 32);
            $table->enum('delivery_type', ['delivery', 'pickup']);
            $table->text('address')->nullable();
            $table->string('payment_method', 32);
            $table->text('note')->nullable();
            $table->decimal('total', 12, 2);
            $table->enum('status', ['new', 'accepted', 'completed', 'cancelled'])->default('new');
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
