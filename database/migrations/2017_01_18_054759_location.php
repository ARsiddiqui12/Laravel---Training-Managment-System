<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Location extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location',function(Blueprint $table){
            
            
            $table->increments('id');
            $table->string('project');
            $table->string('locationid');
            $table->string('categoryid');
            $table->longText('location');
            $table->longText('category');
            $table->longText('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('taluka');
            $table->string('uc');
            $table->string('telephone');
            $table->string('forcalperson');
            $table->string('mobile');
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
        Schema::drop('location');
    }
}
