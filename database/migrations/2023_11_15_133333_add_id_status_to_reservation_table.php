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
        Schema::table('reservation', function (Blueprint $table) {
            $table->bigInteger('idStatus')->unsigned();
            $table ->foreign('idStatus')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_reservation', function (Blueprint $table) {
            //
        });
    }
};
