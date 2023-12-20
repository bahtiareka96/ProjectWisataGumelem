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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchandise_transaction_id');
            $table->string('item_name');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('status'); // Status dari transaksi: PENDING, SUCCESS, CANCEL, FAILED
            $table->timestamps();

            $table->foreign('merchandise_transaction_id')
                  ->references('id')->on('merchandise_transactions')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
