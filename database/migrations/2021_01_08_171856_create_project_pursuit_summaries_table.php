<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPursuitSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_pursuit_summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->string('bos');
            $table->string('stbc');
            $table->string('pedc');
            $table->string('proposal_timeline');
            $table->string('project_timeline');
            $table->string('project_stakeholders');
            $table->string('pb_requirements');
            $table->string('ipri');
            $table->string('isbc');
            $table->string('communication_notes');
            $table->string('ofav');
            $table->string('sredo');
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
        Schema::dropIfExists('project_pursuit_summaries');
    }
}
