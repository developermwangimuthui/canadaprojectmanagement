<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkBreakdownStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_breakdown_structures', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
           $table->uuid('scope_work_description_id');
           $table->uuid('project_participant_id');
            $table->string('hours');
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
        Schema::dropIfExists('work_breakdown_structures');
    }
}
