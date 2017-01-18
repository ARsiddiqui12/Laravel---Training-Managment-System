<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trainingcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingcategory',function(Blueprint $table){
            
           
            
            $table->increments('id');
            $table->string('categoryid');
            $table->longText('project');
            $table->longText('category');
            $table->longText('description');
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
        Schema::drop('trainingcategory');
    }
}
