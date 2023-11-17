<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('rooms', function (Blueprint $table) {
      $table->bigInteger('price')->unsigned()->nullable();
    });
    DB::table('rooms')->insert([
      ['numberOfBeds' => 2, 'square' => 20, 'number' => 101, 'quantityIsBusy' => 0, 'price' => 100, 'created_at' => now(), 'updated_at' => now()],
      ['numberOfBeds' => 1, 'square' => 15, 'number' => 102, 'quantityIsBusy' => 1, 'price' => 80, 'created_at' => now(), 'updated_at' => now()],
      ['numberOfBeds' => 3, 'square' => 25, 'number' => 103, 'quantityIsBusy' => 2, 'price' => 120, 'created_at' => now(), 'updated_at' => now()],
      ['numberOfBeds' => 2, 'square' => 18, 'number' => 104, 'quantityIsBusy' => 0, 'price' => 90, 'created_at' => now(), 'updated_at' => now()],
      ['numberOfBeds' => 1, 'square' => 12, 'number' => 105, 'quantityIsBusy' => 1, 'price' => 70, 'created_at' => now(), 'updated_at' => now()]
    ]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('rooms', function (Blueprint $table) {
      $table->dropColumn('price');
    });
  }
};
