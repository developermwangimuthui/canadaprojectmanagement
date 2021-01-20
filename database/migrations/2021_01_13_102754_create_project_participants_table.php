<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_participants', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->string('position');
            $table->string('comment');
            $table->string('rate');
            $table->string('unit');
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
        Schema::dropIfExists('project_participants');
    }
}
