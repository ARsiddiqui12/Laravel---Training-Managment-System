<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Trainingmodel extends Model
{
    
    
    public function getarea()
    {
    
   return $this::with('country')->get();
        
    }
    
}
