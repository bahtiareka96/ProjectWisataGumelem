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
        Schema::create('merchandise_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('merchandise_orders_id');
            $table->integer('users_id')->nullable();
            $table->string('email');
            $table->string('address');
            $table->string('expedition');
            $table->integer('quantity_order');
            $table->integer('price');
            $table->integer('expedition_price');
            $table->integer('total_price');
            $table->string('status'); //PENDING, SUCCESS, CANCEL, FAILED
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandise_transactions');
    }
};
