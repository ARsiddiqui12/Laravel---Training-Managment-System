<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession',function(Blueprint $table){
            
           $table->increments('id');
           $table->LongText('profession');
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
        Schema::drop('profession');
    }
}
