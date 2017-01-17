<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projectdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectdetails',function (Blueprint $table){

            $table->increments('id');
            $table->string('projectid')->unique();
            $table->longText('projectcate');
            $table->longText('title');
            $table->string('startdate');
            $table->string('enddate');
            $table->longText('description');
            $table->longText('logo');
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
        Schema::drop('projectdetails');
    }
}
