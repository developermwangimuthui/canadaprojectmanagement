<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectInitiationSummaryCommunicationPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_i_summary_communication_plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->string('type');
            $table->string('ie');
            $table->string('format');
            $table->string('responsibilty');
            $table->string('frequency');
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
        Schema::dropIfExists('project_initiation_summary_communication_plans');
    }
}
