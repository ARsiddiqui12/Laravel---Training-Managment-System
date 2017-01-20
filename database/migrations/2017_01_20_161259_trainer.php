<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trainer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer',function(Blueprint $table){

            $table->increments('id');
            $table->string('trainername');
            $table->string('surname');
            $table->string('cnic')->unique();
            $table->string('dateofbirth');
            $table->integer('gender');
            $table->longText('address');
            $table->string('mobile');
            $table->string('email');
            $table->longText('qualification');
            $table->longText('profession');
            $table->string('trainertype');
            $table->string('trainerlevel');
            $table->string('primarylanguage');
            $table->string('secondarylanguage');
            $table->longText('info');
            $table->longText('project');
            $table->longText('reportingoffice');
            $table->string('officecode');
            $table->string('officeaddress');
            $table->string('addedby');
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
        Schema::drop('trainer');
    }
}
