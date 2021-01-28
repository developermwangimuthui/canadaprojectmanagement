<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectComplexityEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_complexity_evaluations', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->string('type');
            $table->string('pop');
            $table->string('cos');
            $table->string('rfps');
            $table->string('es');
            $table->string('sm');
            $table->string('nod');
            $table->string('nos');
            $table->string('ss');
            $table->string('pd');
            $table->string('wwgtc');
            $table->string('ei');
            $table->string('pfi');
            $table->string('ecr');
            $table->json('additional_skills')->nullable();
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
        Schema::dropIfExists('project_complexity_evaluations');
    }
}
