<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoNoGoAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('go_no_go_assesments', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->integer('er');
            $table->integer('dr');
            $table->integer('ii');
            $table->integer('scope');
            $table->integer('pm');
            $table->integer('se');
            $table->integer('tr');
            $table->integer('he');
            $table->integer('ci');
            $table->integer('bic');
            $table->integer('aoi');
            $table->integer('ra');
            $table->integer('cl');
            $table->integer('sp');
            $table->integer('cv');
            $table->integer('rgpp');
            $table->integer('pr');
            $table->integer('lr');
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
        Schema::dropIfExists('go_no_go_assesments');
    }
}
