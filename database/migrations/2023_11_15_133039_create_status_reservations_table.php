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
        Schema::create('status_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('status_reservations')->insert([
          ['name' => 'Забронирована', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Свободна', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'На ремонте', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Не сдается', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Частично свободна', 'created_at' => now(), 'updated_at' => now()]
      ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_reservations');
    }
};
