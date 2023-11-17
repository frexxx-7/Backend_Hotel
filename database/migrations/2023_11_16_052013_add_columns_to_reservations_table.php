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
        Schema::table('reservations', function (Blueprint $table) {
            $table->datetime('arrivalDate')->default(DB::raw('now()'));
            $table->datetime('departureDate')->default(DB::raw('now()'));
        });
        DB::table('reservations')->insert([
          ['idUser' => 1, 'idRoom' => 1, 'idStatus' => 1, 'arrivalDate' => now(), 'departureDate' => now(), 'created_at' => now(), 'updated_at' => now()],
          ['idUser' => 2, 'idRoom' => 2, 'idStatus' => 2, 'arrivalDate' => now(), 'departureDate' => now(), 'created_at' => now(), 'updated_at' => now()],
          ['idUser' => 3, 'idRoom' => 3, 'idStatus' => 3, 'arrivalDate' => now(), 'departureDate' => now(), 'created_at' => now(), 'updated_at' => now()],
          ['idUser' => 4, 'idRoom' => 4, 'idStatus' => 4, 'arrivalDate' => now(), 'departureDate' => now(), 'created_at' => now(), 'updated_at' => now()],
          ['idUser' => 5, 'idRoom' => 5, 'idStatus' => 5, 'arrivalDate' => now(), 'departureDate' => now(), 'created_at' => now(), 'updated_at' => now()]
      ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('arrivalDate');
            $table->dropColumn('departureDate');
        });
    }
};
