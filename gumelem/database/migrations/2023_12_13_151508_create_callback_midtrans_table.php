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
        Schema::create('callback_midtrans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trx_order'); 
            $table->json('data');
            $table->enum('status', ['settlement', 'pending', 'refund', 'fraud']);
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('trx_order')->references('id')->on('merchandise_transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('callback_midtrans');
    }
};
