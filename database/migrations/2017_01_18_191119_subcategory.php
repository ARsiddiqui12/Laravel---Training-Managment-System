<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory',function(Blueprint $table){
            
           $table->increments('id');
           $table->string('categoryid');
           $table->string('subcategoryid');
           $table->longText('project');
           $table->LongText('category');
           $table->longText('subcategory');
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
        Schema::drop('subcategory');
    }
}
