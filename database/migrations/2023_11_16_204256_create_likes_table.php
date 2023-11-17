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
    Schema::create('likes', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('idUser')->unsigned();
      $table->foreign('idUser')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
      $table->bigInteger('idNews')->unsigned();
      $table->foreign('idNews')->references('id')->on('news')->cascadeOnDelete()->cascadeOnUpdate();
      $table->timestamps();
    });
    DB::table('likes')->insert([
      ['idUser' => 1, 'idNews' => 1, 'created_at' => now(), 'updated_at' => now()],
      ['idUser' => 2, 'idNews' => 2, 'created_at' => now(), 'updated_at' => now()],
      ['idUser' => 3, 'idNews' => 3, 'created_at' => now(), 'updated_at' => now()],
      ['idUser' => 4, 'idNews' => 4, 'created_at' => now(), 'updated_at' => now()],
      ['idUser' => 5, 'idNews' => 5, 'created_at' => now(), 'updated_at' => now()]
    ]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('likes');
  }
};
