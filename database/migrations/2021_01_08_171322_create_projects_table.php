<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('reference_number');
            $table->string('project_sponsor');
            $table->string('pursuit_lead');
            $table->string('project_manager');
            $table->string('market_sector');
            $table->string('type_of_work');
            $table->string('region');
            $table->string('expected_start_date');
            $table->string('expected_end_date');
            // $table->string('date');
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
        Schema::dropIfExists('projects');
    }
}
