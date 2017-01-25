<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Trainingmodel extends Model
{
    
    
    protected $table='training';

    protected $fillable = [

    'project','projectid',
    'reportingoffice','officecode','officeaddress','officecountry','officestate','officecity',
    'trainingtitle','category','subcategory','trainingmethod',
    'traininglocation','locationaddress',
    'startdate','enddate','traininglength','numberofparticipants',
    'trainerone','trainertwo','trainerthree','trainerfour',
    'info','addedby'



    ];
    
}
