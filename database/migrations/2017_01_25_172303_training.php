<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Training extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training',function(Blueprint $table){

            $table->increments('id');
            $table->longText('project');
            $table->string('projectid');
            $table->longText('reportingoffice');
            $table->string('officecode');
            $table->longText('officeaddress');
            $table->longText('officecountry');
            $table->longText('officestate');
            $table->longText('officecity');
            $table->longText('trainingtitle');
            $table->longText('category');
            $table->longText('subcategory');
            $table->longText('trainingmethod');
            $table->longText('traininglocation');
            $table->longText('locationaddress');
            $table->string('startdate');
            $table->string('enddate');
            $table->string('traininglength');
            $table->string('numberofparticipants');
            $table->string('trainerone');
            $table->string('trainertwo');
            $table->string('trainerthree');
            $table->string('trainerfour');
            $table->longText('info');
            $table->string('addedby');
            $table->integer('status')->default(1);
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
        Schema::drop('training');
    }
}
