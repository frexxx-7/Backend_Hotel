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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();
    });
    DB::table('users')->insert(
      array(
        [
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('admin-12345'),
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'user1',
          'email' => 'user1@gmail.com',
          'password' => Hash::make('password1-12345'),
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'user2',
          'email' => 'user2@gmail.com',
          'password' => Hash::make('password2-12345'),
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'user3',
          'email' => 'user3@gmail.com',
          'password' => Hash::make('password3-12345'),
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'user4',
          'email' => 'user4@gmail.com',
          'password' => Hash::make('password4-12345'),
          'created_at' => now(),
          'updated_at' => now(),
        ],
      )
    );
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
