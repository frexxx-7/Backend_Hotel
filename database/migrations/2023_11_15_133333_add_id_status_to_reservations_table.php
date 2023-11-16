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
    Schema::table('reservations', function (Blueprint $table) {
      $table->bigInteger('idStatus')->unsigned()->default(null);
      $table->foreign('idStatus')->references('id')->on('status_reservations');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('reservations', function (Blueprint $table) {
      $table->dropForeign('reservations_idstatus_foreign');
      $table->dropColumn('idStatus');
    });
  }
};
