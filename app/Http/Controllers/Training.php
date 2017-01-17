<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Training extends Controller
{
    
    public function locationForm(Request $request)
    {
     
        return view('traininglocation',['title'=>'Add Training Location']);
        
    }    
    
}
