<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectInitiationSummaryTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_initiation_summary_teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->string('tname');
           $table->uuid('project_participants_id');
            $table->json('skills_required')->nullable();
            $table->string('expirience_level');
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
        Schema::dropIfExists('project_initiation_summary_teams');
    }
}
