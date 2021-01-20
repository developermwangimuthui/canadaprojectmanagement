<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLessonLearntSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_lesson_learnt_summaries', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->string('project_goals_attained');
            $table->string('what_went_well');
            $table->string('what_went_wrong');
            $table->string('better_handled_if_done_diff');
            $table->string('recomendations');
            $table->string('beyond_control');
            $table->string('surprises');
            $table->string('anticipated_but_didnt_happen');
            $table->string('mistakes_avoided');
            $table->string('possible_automation');
            $table->string('missing_skills');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_lesson_learnt_summaries');
    }
}
