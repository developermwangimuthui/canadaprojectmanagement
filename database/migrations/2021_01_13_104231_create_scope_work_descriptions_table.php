<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScopeWorkDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scope_work_descriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
           $table->uuid('project_stage_id');
            $table->string('scope_work_description');
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
        Schema::dropIfExists('scope_work_descriptions');
    }
}
