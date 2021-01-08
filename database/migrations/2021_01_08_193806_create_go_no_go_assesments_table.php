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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->integer('relationship_establishment');
            $table->integer('wtdr');
            $table->integer('piwc');
            $table->integer('aosrtbc');
            $table->integer('profit_expectation');
            $table->integer('secfp');
            $table->integer('track_record');
            $table->integer('rtcp');
            $table->integer('iwc');
            $table->integer('biioc');
            $table->integer('aoitb');
            $table->integer('ratpp');
            $table->integer('loc');
            $table->integer('pos');
            $table->integer('awcv');
            $table->integer('ptgpp');
            $table->integer('project_risks');
            $table->integer('ateltr');
            $table->string('comments');
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
