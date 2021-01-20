<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHazardIdentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazard_identifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->string('type');
            $table->string('specific_task');
            $table->string('hazard_type');
            $table->string('probability_to_occur');
            $table->string('control');
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
        Schema::dropIfExists('hazard_identifications');
    }
}
