<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanResourceRequestFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_resource_request_forms', function (Blueprint $table) {
            $table->uuid('id')->primary();
           $table->uuid('project_id');
            $table->json('services')->nullable();
            $table->string('level');
            $table->string('hours');
            $table->string('ínstructions');
            $table->integer('crews_required');
            $table->string('expirience_level');
            $table->json('skills')->nullable();
            $table->string('other_qualifications');
            $table->string('shift_duration');
            $table->string('control');
            $table->string('control_location');
            $table->string('datum');
            $table->json('survey_data_package')->nullable();
            $table->json('fsd')->nullable();
            $table->json('safety_training_required')->nullable();
            $table->json('special_ppe')->nullable();
            $table->json('sertcw')->nullable();
            $table->json('feild_supplies_materials')->nullable();
            $table->string('sec');
            $table->string('twp');
            $table->string('rge');
            $table->string('meridian');
            $table->double('longitude');
            $table->double('latitude');
            $table->string('utmc');
            $table->string('map');
            $table->string('meeting');
            $table->string('with');
            $table->string('location');
            $table->string('date');
            $table->string('phone');
            $table->string('contact_name');
            $table->string('owner_infor');
            $table->string('crew_to_contact_land_owner');
            $table->string('time');
            $table->string('hotel');
            $table->string('accomodation');
            $table->string('near_camp');
            $table->string('other');
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
        Schema::dropIfExists('human_resource_request_forms');
    }
}
