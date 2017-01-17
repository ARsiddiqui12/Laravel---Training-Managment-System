<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Targetedplace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('targetedplace',function(Blueprint $table){
             
             
             $table->increments('id');
             $table->string('projectid');
             $table->longText('projectname');
             $table->string('facilityid');
             $table->longText('targetedplace');
             $table->string('categoryid');
             $table->longText('category');
             $table->longText('address');
             $table->longText('postalcode');
             $table->string('email');
             $table->string('telephone');
             $table->string('country');
             $table->string('state');
             $table->string('city');
             $table->string('longnlat');
             $table->string('info');
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
         Schema::drop('targetedplace');
    }
}
