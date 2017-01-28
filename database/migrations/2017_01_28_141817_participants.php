<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Participants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('participant',function(Blueprint $table){

        $table->increments('id');
        $table->string('participantid');
        $table->string('projectid');
        $table->string('officeid');
        $table->string('trainingid');
        $table->longText('trainingtitle');
        $table->string('startdate');
        $table->longText('maincategory');
        $table->longText('subcategory');
        $table->longText('trainingmethod');
        $table->string('name');
        $table->string('surname');
        $table->string('cnic')->unique();
        $table->string('dateofbirth');
        $table->string('gender');
        $table->longText('address');
        $table->string('mobile');
        $table->string('email');
        $table->longText('targetedplace');
        $table->string('placecode');
        $table->longText('placeaddress');
        $table->string('country');
        $table->string('state');
        $table->string('city');
        $table->longText('qualification');
        $table->longText('profession');
        $table->string('pretestscore');
        $table->string('pretotalscore');
        $table->string('postestscore');
        $table->string('posttotalscore');
        $table->string('mastertrainer');
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
        Schema::drop('participant');
    }
}
