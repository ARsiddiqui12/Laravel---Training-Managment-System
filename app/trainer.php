<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
	protected $table = 'trainer';
    
	protected $fillable =[      

	'trainername','surname','cnic','dateofbirth','gender','address','mobile','email','qualification','profession','trainertype','trainerlevel','primarylanguage','secondarylanguage','info','project','reportingoffice','officecode','officeaddress'


	];

}
