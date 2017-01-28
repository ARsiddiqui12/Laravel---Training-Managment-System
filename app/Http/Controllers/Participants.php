<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trainingmodel;

use App\profession;

use App\targetedplace;

use DB;

class Participants extends Controller
{
    Public function addparticipatForm($id)
    {

    	$training = DB::table('training')
      ->select('training.*','training.project as projectname','trainingcategory.*','subcategory.*','trainingmethod.*')
      ->join('trainingcategory','training.category','=','trainingcategory.categoryid')
      ->join('trainingmethod','training.trainingmethod','=','trainingmethod.methodid')
      ->join('subcategory','training.subcategory','=','subcategory.subcategoryid')
      ->where(['training.id'=>$id,'training.status'=>1])->get();

      	$profession =  profession::where('status',1)->get();

      	$targetedplace = targetedplace::where('status',1)->get();

    	return view('addparticipant',['title','Participant Registration','training'=>$training,'profession'=>$profession,'targetedplace'=>$targetedplace]);
    	
    }
}
