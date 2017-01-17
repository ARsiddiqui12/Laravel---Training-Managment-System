<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
|
| Custom Routes Define Here
|
*/

   Route::post('/login',['uses'=>'Signincontroller@checkLogin','as'=>'sign.in']);

   Route::group(['prefix'=>'project','middleware'=>'auth'],function (){

   Route::get('/add','Projectcontroller@projectaddForm');

   Route::post('/add',['uses'=>'Projectcontroller@addProject','as'=>'project.add']);    

   Route::post('/addpcat',['uses'=>'Projectcontroller@addProjectcategory','as'=>'pcat.add']);
    
   Route::get('/view',['uses'=>'Projectcontroller@viewProject','as'=>'project.view']);
    
   Route::get('/singleview/{projectid}','Projectcontroller@projectSingleview')->where('projectid','[0-9]+');    
    
   Route::get('/delete/{projectid}','Projectcontroller@deleteProject')->where('projectid','[0-9]+');

   Route::get('/edit/{projectid}','Projectcontroller@editProject')->where('projectid','[0-9]+');

   Route::post('/edit',['uses'=>'Projectcontroller@editprojectaction','as'=>'project.edit']);
    
   Route::get('/category','Projectcontroller@categoryList'); 
    
   Route::get('/deletecat/{categoryid}','Projectcontroller@categoryDelete')->where('categoryid','[0-9]+');    
    
   Route::get('/settings/{projectid}','Projectcontroller@settingsPage')->where('porjectid','[0-9]+');  
    
   Route::post('/addcountry',['uses'=>'Projectcontroller@addworkingArea','as'=>'country.add']); 
    
   Route::get('/deletecity/{id}','Projectcontroller@deleteCity')->where('id','[0-9]+');    
    
   Route::post('addplace',['uses'=>'Projectcontroller@addTargetedplace','as'=>'targetedplace.add']);    
    
   Route::post('office',['uses'=>'Projectcontroller@addOffice','as'=>'office.add']);    
    
   Route::get('/deletetarget/{id}','Projectcontroller@deleteTarget')->where('id','[0-9]+'); 
    
   Route::get('/deletetoffice/{id}','Projectcontroller@deleteOffice')->where('id','[0-9]+');      
    
   //Route::get('/test','projectcontroller@testingone');
    
});



/*
|
|Training Controller Routes Start Here
|
*/

Route::group(['prefix'=>'training','middleware'=>'auth'],function(){
    
Route::get('/addlocation','training@locationForm');    
    
    
    
    
    
    
    
    
    
    
});















