<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Country extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country',function(Blueprint $table){
            
            $table->increments('id');
            $table->string('projectid');
            $table->longText('projectname');
            $table->string('countryid');
            $table->string('country');
            $table->string('stateid');
            $table->string('state');
            $table->string('cityid');
            $table->string('city');
            $table->longText('info');
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
        Schema::drop('country');
    }
}
