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
    
Route::post('/addlocation',['uses'=>'training@addLocation','as'=>'add.location']);    
    
Route::get('/viewlocation','training@viewLocations');

Route::get('/deletelocation/{id}','training@deleteLocation')->where('id','[0-9]+');    
    
Route::get('/test','training@codeTest');    
    
Route::get('/addcategory','training@categoryForm');
    
Route::post('/addCategory',['uses'=>'training@addCategory','as'=>'category.add']);    

Route::get('/viewcategory','training@viewCategory');

Route::get('/deletecategory/{id}','training@deleteCategory')->where('id','[0-9]+');    

Route::get('/addsubcategory','training@subcategoryForm');    
    
Route::post('/addsubcategory',['uses'=>'training@addSubcategory','as'=>'subcategory.add']);    
 
Route::get('/viewsubcategory','training@viewSubcategory'); 

Route::get('/deletesubcategory/{id}','training@deleteSubcategory')->where('id','[0-9]+'); 

Route::get('/addmethod','training@addMethod');

Route::post('/addmethod',['uses'=>'training@methodSave','as'=>'method.add']);

Route::get('/viewmethod','training@viewMethod');

Route::get('/deletemethod/{id}','training@deleteMethod')->where('id','[0-9]+');

Route::get('/addtrainer','training@addTrainerform');

Route::post('addprofession',['uses'=>'training@addProfession','as'=>'profession.add']);

Route::post('/addtrainer',['uses'=>'training@addTrainer','as'=>'trainer.add']);

Route::get('/trainer','training@viewTrainers');

Route::get('/viewtrainer/{id}','training@viewSingletrainer')->where('id','[0-9]+');

Route::get('/deletetrainer/{id}','training@deleteTrainer')->where('id','[0-9]+');   

Route::get('/add','training@trainingForm');

Route::post('/getcategory',['uses'=>'training@getcategorybyProject','as'=>'category.get']);

Route::post('/getmethod',['uses'=>'training@getMethodbyproject','as'=>'method.get']);

Route::post('/getsubcategory',['uses'=>'training@getSubcategorybyproject','as'=>'subcategory.get']);

Route::post('/add',['uses'=>'training@addTraining','as'=>'training.add']);

Route::get('/view','training@viewTraining');

Route::get('/view/{id}','training@viewSingletraining')->where('id','[0-9]+');

Route::get('/delete/{id}','training@deleteTraining')->where('id','[0-9]+');


});


Route::group(['prefix'=>'participant','middleware'=>'auth'],function(){


Route::get('/add/{id}','participants@addparticipatForm')->where('id','[0-9]+');


});













