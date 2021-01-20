<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectInitiationSummaryExpectedDeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_i_summary_expected_deliverables', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->string('type');
            $table->string('fo');
            $table->string('description');
            $table->string('responsibilty');
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
        Schema::dropIfExists('project_initiation_summary_expected_deliverables');
    }
}
