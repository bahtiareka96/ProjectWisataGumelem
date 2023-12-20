<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // In the generated migration file
    public function up()
    {
        Schema::table('merchandise_transactions', function (Blueprint $table) {
            $table->string('no_resi')->nullable();
        });
    }

    // Add a down method if you want to rollback the migration
    public function down()
    {
        Schema::table('merchandise_transactions', function (Blueprint $table) {
            $table->dropColumn('no_resi');
        });
    }

};
