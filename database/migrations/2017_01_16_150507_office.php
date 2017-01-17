<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Office extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office',function(Blueprint $table){
            
           
             $table->increments('id');
             $table->string('projectid');
             $table->longText('projectname');
             $table->string('branchcode');
             $table->longText('branch');
             $table->longText('address');
             $table->longText('postalcode');
             $table->string('fax');
             $table->string('telephone');
             $table->string('country');
             $table->string('state');
             $table->string('city');
             $table->string('taluka');
             $table->string('uc');
             $table->string('longnlat');
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
        Schema::drop('office');
    }
}
