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
    Schema::create('news', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('content');
      $table->longText('image')->nullable();
      $table->boolean('is_published')->default(1);
      $table->timestamps();
    });
    DB::table('news')->insert(
      array(
        [
          'title' => '"Общежитие открыло новую спортивную зону для сотрудников"',
          'content' => '"Теперь сотрудники могут заниматься спортом прямо на территории общежития, что поможет им поддерживать здоровье и форму."',
          'is_published' => true,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'title' => '"Общежитие провело мастер-класс по кулинарии для жильцов"',
          'content' => 'С"отрудники общежития смогли научиться готовить новые блюда и узнать полезные секреты кулинарии."',
          'is_published' => true,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'title' => '"Общежитие организовало экскурсию в местный музей для жильцов"',
          'content' => '"Жильцы общежития смогли провести выходной день с пользой, посетив интересные экспозиции музея."',
          'is_published' => true,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'title' => '"Общежитие провело вечеринку для своих жильцов"',
          'content' => '"Сотрудники общежития собрались вместе, чтобы отдохнуть и повеселиться после рабочей недели."',
          'is_published' => true,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'title' => '"Общежитие начало программу по обучению иностранным языкам для сотрудников"',
          'content' => '"Теперь жильцы общежития могут изучать иностранные языки прямо на своей территории, что поможет им повысить свои профессиональные навыки."',
          'is_published' => true,
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
    Schema::dropIfExists('news');
  }
};
