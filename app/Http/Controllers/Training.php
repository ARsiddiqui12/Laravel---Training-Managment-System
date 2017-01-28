<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trainingmodel;

use Validator;

use DB;

use Illuminate\Support\Facades\Auth;

use App\profession;

use App\office;

use App\trainer;

use App\project;

use App\Trainingcategories;

use App\Subcategory;

use App\Trainingmethod;

use App\Location;


class Training extends Controller
{
    
    public function locationForm()
    {
             
         $result = DB::table('country')->where('status',1)->distinct();
        
         $country = $result->select('countryid','country')->get();
        
         $state = $result->select('stateid','state')->get();
        
         $city = $result->select('cityid','city')->get();
        
         $project = DB::table('projectdetails')->where('status',1)->get();
            
        return view('traininglocation',[
            'title'=>'Add Training Location',
            'country'=>$country,
            'state'=>$state,
            'city'=>$city,
            'project'=>$project
            
        ]);
        
    }  
    
    public function addLocation(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            
            'project'=>'required',
            'location'=>'required|unique:location',
            'category'=>'required',
            'address'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            
        ],[
            
            'location.unique'=>'This Location is already exist...!'
            
        ]);
        
        
        if($validator->Fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('location','category','address','telephone','taluka','uc','focal','mobile','info'));
        
        }else{
         
            $project = $request->input('project');
            
            $location = $request->input('location');
            
            $category = $request->input('category');
            
            $address = $request->input('address');
            
            $country = $request->input('country');
            
            $state = $request->input('state');
            
            $city = $request->input('city');
            
            $taluka = $request->input('taluka');
            
            $uc = $request->input('uc');
            
            $telephone = $request->input('telephone');
            
            $focal = $request->input('focal');
            
            $mobile = $request->input('mobile');
        
            $info = $request->input('info');
            
            $createdat = date('y-m-d h:i:s');
            
            $userinfo = Auth::user();
            
            $addedby = $userinfo->id."-".$userinfo->username;
            
            $resultid = DB::table('location')->where('status',1)->get();
            
            $count = $resultid->count();
            
            if($count>0)
            { 
                $lastlocationid = DB::table('location')->where('status',1)->orderBy('id', 'desc')->first();
                
                $locationid = $lastlocationid->locationid+1;  
                
            }else
            { 
                $locationid = 60000000;  
            }
            
            $resultcat = DB::table('location')->where(['category'=>$category,'status'=>1])->get();
            
            $countcat = $resultcat->count();
            
            if($countcat>0)
            {
               
                $categoryid = $resultcat[0]->categoryid;
                
            }else
            {
                $getlastid=DB::table('location')->where('status',1)->orderBy('id', 'desc')->first();
                
                if($getlastid)
                {
                $categoryid = $getlastid->categoryid +1;
                }else{
                $categoryid = 01;    
                }    
                
            }
            
            $expcountry = explode("-",$country);
            $expstate = explode("-",$state);
            $expcity = explode("-",$city);
            
            $checkarea = DB::table('country')->where(['country'=>$expcountry[1],
                                                      'state'=>$expstate[1],
                                                      'city'=>$expcity[1]]    
                                                    )->count();
            if($checkarea>0)
            {
            
            DB::table('location')->insert([
                
                'project'=>$project ,
                'locationid'=>$locationid ,
                'categoryid'=> $categoryid,
                'location'=> $location,
                'category'=>$category ,
                'address'=> $address,
                'country'=> $country,
                'state'=> $state,
                'city'=> $city,
                'taluka'=>$taluka ,
                'uc'=>$uc ,
                'telephone'=>$telephone ,
                'forcalperson'=> $focal,
                'mobile'=> $mobile,
                'info'=> $info,
                'addedby'=> $addedby,
                'created_at'=> $createdat
                
                
                
            ]);
            
            Session()->flash('successmsg','Training Location Added Successfully...!');
            
            return back();
                
            }else{
                
                 
                $validator->errors()->add('country', 'Please Select Valid State and City of The Location..!');
                
                return back()->withErrors($validator)->withInput($request->flashOnly('location','category','address','telephone','taluka','uc','focal','mobile','info'));
                
            }
        }
        
    }
    
    
    
    
    
    public function viewLocations()
    {
        
        $locations = DB::table('location')->where('status',1)->get();
        
        return view('viewlocations',[
            'title'=>'View Locations',
            'locations'=>$locations
            
        
        ]);
        
    }
    
    public function deleteLocation($id)
    {
        
        DB::table('location')->where(['id'=>$id,'status'=>1])->update(['status'=>0]);
        
        Session()->flash('deletemsg','Training Location Deleted Successfully...!');
        
        return back();
        
    }
    
    
    public function categoryForm()
    {
        
        $project = DB::table('projectdetails')->where('status',1)->get();
        
        return view('addcategory',['title'=>'Training Category','project'=>$project]);
        
    }
    
    public function addCategory(Request $request)
    {
        
        $validator= Validator::make($request->all(),[
           'project'=>'required',
           'category'=>'required',
           'description'=>'required'        
        ]);
        
        if($validator->Fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('category','description'));
            
        }else{
            
        $checkcat = DB::table('trainingcategory')->where(['project'=>$request->input('project'),'category'=>$request->input('category'),'status'=>1])->get();
        
        $count = $checkcat->count();
            
        $project =  $request->input('project');   
        
        $category = $request->input('category');
            
        $description = $request->input('description');
        
        $categoryid = rand(1000,10000);    
            
        $userinfo = Auth::user();
            
        $addedby = $userinfo->id."-".$userinfo->username;    
            
        if($count>0)
        {
        
            
            
            $expproject = explode("-",$request->input('project'));
            
            $validator->errors()->add('category', 'This Category is already exist...!');
            
            return back()->withErrors($validator)->withInput($request->flashOnly('category','description'));
        
        }else
        {
            
            DB::table('trainingcategory')->insert([
                
                'categoryid'=>$categoryid,
                'project'=>$project,
                'category'=>$category,
                'description'=>$description,
                'addedby'=>$addedby,
                'created_at'=>date('y-m-d h:i:s')
            ]);
            
            Session()->flash('successmsg','Category added Successfully...!');
            
            return back();
            
        }
            
            
        }
        
    }
    
    
    public function viewCategory()
    {
    
    $trainingcategories = DB::table('trainingcategory')->join('projectdetails','trainingcategory.project','=','projectdetails.projectid')->where('trainingcategory.status',1)->get();
        
    return view('viewtrainingcategories',[
        
        'title'=>'Training Categories',
        'tcat'=> $trainingcategories
        
    ]) ;   
    
    }

    public function deleteCategory($id)
    {
    
    DB::table('trainingcategory')->where(['id'=>$id,'status'=>1])->update(['status'=>0]);
    
    Session()->flash('successmsg','Category deleted Successfully..!');    
        
    return back();    
    
    }
        
    
    public function subcategoryForm()
    {
    
    $project = DB::table('projectdetails')->where('status',1)->get();   
        
    $category = DB::table('trainingcategory')->where('status',1)->get();    
        
    return view('addsubcategory',[
        
       'title'=>'Training SubCategory',
       'project'=>$project,
       'category'=>$category
        
    ]);
    
    }
    
    public function addSubcategory(Request $request)
    {
    
        $validator= Validator::make($request->all(),[
           'project'=>'required',
           'category'=>'required',
            'subcategory'=>'required',
           'description'=>'required'        
        ]);

        if($validator->Fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('subcategory','description'));
        
        }else{
            
            $project = $request->input('project');
            
            $exp = explode("-",$request->input('category'));
            
            $expcategoryid = $exp[0];
            
            $expcategory = $exp[1];
            
            $subcategoryid = rand(15000,35000);
            
            $subcategory = $request->input('subcategory');
            
            $description = $request->input('description');
            
            $userinfo = Auth::user();
            
            $addedby = $userinfo->id."-".$userinfo->username;
            
            $createdat = date('y-m-d h:i:s');
            
            $checksubcat = DB::table('subcategory')->where(['project'=>$project,'category'=>$expcategory,'subcategory'=>$subcategory,'status'=>1])->count();
            
            if($checksubcat>0)
            {
                
            $validator->errors()->add('subcategory', 'This Sub Category is already exist...!');
            
            return back()->withErrors($validator)->withInput($request->flashOnly('subcategory','description'));
            
            }else{            
            DB::table('subcategory')->insert([
                
                'categoryid'=>$expcategoryid ,
                'subcategoryid'=>$subcategoryid ,
                'project'=> $project,
                'category'=> $expcategory,
                'subcategory'=> $subcategory,
                'description'=>$description ,
                'addedby'=> $addedby,
                'created_at'=> $createdat
               
                
                
            ]);    
            
            Session()->flash('successmsg','The Sub Category Successfully Added...!');
            
            return back();
            }

        }
    
    }
    
    public function viewSubcategory()
    {
        $subcat = DB::table('subcategory')->join('projectdetails','subcategory.project','=','projectdetails.projectid')->where('subcategory.status',1)->get();
        
        return view('viewsubcategory',['title'=>'View Sub Category',
                                        'subcat'=>$subcat
                                      
                                      ]);
        
    }
    
    public function deleteSubcategory($id)
    {
    
    DB::table('subcategory')->where(['id'=>$id,'status'=>1])->update(['status'=>0]);
    
    Session()->flash('successmsg','Sub Category deleted Successfully..!');    
        
    return back();    
    
    
    }


    public function addMethod()
    {


    $project = DB::table('projectdetails')->where('status',1)->get();  

    return view('addmethod',['title'=>'Training Method',
                                  'project'=>$project   

            ]);

    }

    public function methodSave(Request $request)
    {

        $validator= Validator::make($request->all(),[
           'project'=>'required',
           'method'=>'required',
           'description'=>'required'        
        ]);
        
        if($validator->Fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('method','description'));
            
        }else{
            
            $project = $request->input('project');
            $method  = $request->input('method');
            $description = $request->input('description');
            $userinfo = Auth::user();
            $addedby = $userinfo->id."-".$userinfo->username;
            $createdat = date('y-m-d h:i:s');
            $methodid = rand(25000,30000);

            $checkmethod = DB::table('trainingmethod')->where([

                'project'=>$project,
                'method'=>$method,
                'status'=>1

                ])->count();

            if($checkmethod>0)
            {

            $validator->errors()->add('method', 'This Training Method is already exist...!');
            
            return back()->withErrors($validator)->withInput($request->flashOnly('method','description')); 

            }else{


             DB::table('trainingmethod')->insert([
                
                'methodid'=>$methodid,
                'project'=>$project ,
                'method'=> $method,
                'description'=>$description ,
                'addedby'=> $addedby,
                'created_at'=> $createdat
               
                
                
            ]);    
            
            Session()->flash('successmsg','The Training Method Successfully Added...!');
            
            return back();    



            }


            }

}

    public function viewMethod()
    {

        $methods = DB::table('trainingmethod')->join('projectdetails','trainingmethod.project','=','projectdetails.projectid')->where('trainingmethod.status',1)->get();

        return view('viewmethods',[

           'title'=>'View Training Method',
           'methods'=> $methods

            ]);

    }

    public function deleteMethod($id)
    {

    DB::table('trainingmethod')->where(['id'=>$id,'status'=>1])->update(['status'=>0]);
    
    Session()->flash('successmsg','Training Method deleted Successfully..!');    
        
    return back();  


    }



    public function addTrainerform()
    {

        $project = DB::table('projectdetails')->where('status',1)->get(); 

        $office = office::where('status',1)->get();

        $getprofession = profession::where('status',1)->get();

        return view('addtrainer',[

            'title'=>'Trainer Registration',
            'project'=>$project,
            'getprofession'=>$getprofession,
            'office'=>$office

            ]);

    }


    public function addProfession(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'profession'=>'required|unique:profession'

            ]);

        if($validator->Fails())
        {

            return back()->withErrors($validator)->withInput($request->flashOnly('profession','info'));

        }else
        {

            $profession = $request->input('profession');

            $info = $request->input('info');

            $userinfo = Auth::user();

            $addedby = $userinfo->id."-".$userinfo->username;

            $obj = new profession();

            $obj->profession = $profession;

            $obj->info = $info;

            $obj->addedby = $addedby ;

            $obj->save();

            Session()->flash('profession','This ['.$profession.'] Added Successfully...!');

            return back();
        }

    }


    public function addTrainer(Request $request)
    {

        $validator = Validator::make($request->all(),[

                'trainername'=>'required',
                'surname'=>'required',
                'cnic'=>'required|unique:trainer',
                'dateofbirth'=>'required',
                'gender'=>'required',
                'address'=>'required',
                'mobile'=>'required',
                'email'=>'unique:trainer',
                'qualification'=>'required',
                'profession'=>'required',
                'trainertype'=>'required',
                'trainerlevel'=>'required',
                'primarylanguage'=>'required',
                'project'=>'required',
                'reportingoffice'=>'required'

            ],[

            'cnic.unique'=>'This Trainer Already Exist...!',
            'email.unique'=>'Email already Exist..!'

            ]);


        if($validator->Fails())
        {

            return back()->withErrors($validator)->withInput($request->flashOnly('trainername','surname','cnic','dateofbirth','address','mobile','email','qualification','primarylanguage','secondarylanguage','info','reportingoffice','officecode','officeaddress'));

        }else
        {

            $userinfo = Auth::user();

            $addedby = $userinfo->id."-".$userinfo->username;

            $trainer = new trainer();

            $trainer->trainername = $request->input('trainername');

            $trainer->surname = $request->input('surname');

            $trainer->cnic = $request->input('cnic');

            $trainer->dateofbirth = $request->input('dateofbirth');

            $trainer->gender = $request->input('gender');

            $trainer->address = $request->input('address');

            $trainer->mobile = $request->input('mobile');

            $trainer->email = $request->input('email');

            $trainer->qualification = $request->input('qualification');

            $trainer->profession = $request->input('profession');

            $trainer->trainertype = $request->input('trainertype');

            $trainer->trainerlevel = $request->input('trainerlevel');

            $trainer->primarylanguage = $request->input('primarylanguage');

            $trainer->secondarylanguage = $request->input('secondarylanguage');

            $trainer->info = $request->input('info');

            $trainer->project = $request->input('project');

            $trainer->reportingoffice = $request->input('reportingoffice');

            $trainer->officecode = $request->input('officecode');

            $trainer->officeaddress = $request->input('officeaddress');

            $trainer->addedby = $addedby;

            $trainer->save();

            Session()->flash('successmsg','This Trainer ['.$request->input('trainername').' '.$request->input('surname').'] Added Successfully...!');

            return back();

        }


    }

    public function viewTrainers()
    {

        $trainer = trainer::where('status',1)->get();

        return view('viewtrainers',['title'=>'Trainers List','trainer'=>$trainer]);

    }


    public function viewSingletrainer($id)
    {

        $trainer = trainer::where(['id'=>$id,'status'=>1])->get();

        return view('viewsingletrainer',['title','View Trainer','trainer'=>$trainer]);

    }

    public function deleteTrainer($id)
    {

       trainer::where(['id'=>$id,'status'=>1])->update(['status'=>0]);
       
       Session()->flash('successmsg','Trainer Deleted Successfully...!');

       return back(); 

    }

    public function getcategorybyProject(Request $request)
    {

        $projectid = $request->input('projectid');

        $category = Trainingcategories::where(['project'=>$projectid,'status'=>1])->get();

        $count = $category->count();

        if($count>0)
        {

            if($request->ajax())
        {

            return response()->json([

                   'category'=>$category 

                ]);
        }


        }else{

            return "false";
        }

        

    }

    public function getMethodbyproject(Request $request)
    {

        $projectid = $request->input('projectid');

        
        $result = Trainingmethod::where(['project'=>$projectid,'status'=>1])->get();

        $count = $result->count();

        if($count>0)
        {
        if($request->ajax())
        {

            return response()->json([

                   'result'=>$result 

                ]);
        }
    }else{

        return "false";

    }

    }

    public function getSubcategorybyproject(Request $request)
    {

        $catid  = $request->input('catid');

        $subcat = Subcategory::where(['categoryid'=>$catid,'status'=>1])->get();

        $count = $subcat->count();

        if($count>0)
        {

            if($request->ajax())
        {

            return response()->json([

                'subcat'=>$subcat

                ]);

        }


        }else{


            return "false";


        }
        

    }

    public function trainingForm()
    {
        $office = office::where('status',1)->get();

        $project = project::where('status',1)->get();

        $location = Location::where('status',1)->get();

        $trainer = trainer::where('status',1)->get();

        return view('addtraining',['title','Training Registration',
                                    'office'=>$office,
                                    'project'=>$project,
                                    'location'=>$location,
                                    'trainer'=>$trainer
                                    
                                    ]);
    }


    public function addTraining(Request $request)
    {


        $validator = Validator::make($request->all(),[


            'projectname'=>'required',
            'projectid'=>'required',
            'office'=>'required',
            'officecode'=>'required',
            'address'=>'required',
            'csc'=>'required',
            'trainingtitle'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'trainingmethod'=>'required',
            'location'=>'required',
            'locationaddress'=>'required',
            'locationarea'=>'required',
            'startdate'=>'required',
            'enddate'=>'required',
            'length'=>'required',
            'numberofparticipants'=>'required',
            'trainerone'=>'required'
            
            ]);


        if($validator->Fails())
        {

            $values = $request->flashOnly('projectname',
                                          'projectid',
                                          'office',
                                          'officecode',
                                          'address',
                                          'csc',
                                          'trainingtitle',
                                          'location',
                                          'locationaddress',
                                          'locationarea',
                                          'startdate',
                                          'enddate',
                                          'length',
                                          'numberofparticipants',
                                          'trainerone',
                                          'trainertwo',
                                          'trainerthree',
                                          'trainerfour',
                                          'info'
                                         );

            return back()->withErrors($validator)->withInput($values);

        }else{

            $project = $request->input('projectname');

            $projectid = $request->input('projectid');

            $reportingoffice = $request->input('office');

            $officecode = $request->input('officecode');

            $officeaddress = $request->input('address');

            $exp = explode("/", $request->input('csc'));

            $country = $exp[0];

            $state = $exp[1];
            
            $city = $exp[2];

            $trainingtitle = $request->input('trainingtitle');

            $category = $request->input('category');

            $subcategory = $request->input('subcategory');

            $trainingmethod = $request->input('trainingmethod');

            $location = $request->input('location');

            $locationaddress  = $request->input('locationaddress');

            $locationarea = $request->input('locationarea');

            $startdate = $request->input('startdate');

            $enddate = $request->input('enddate');

            $length = $request->input('length');

            $numberofparticipants = $request->input('numberofparticipants');

            $trainerone = $request->input('trainerone');

            $trainertwo = $request->input('trainertwo');

            $trainerthree = $request->input('trainerthree');

            $trainerfour = $request->input('trainerfour');

            $info = $request->input('info');

            $userinfo = Auth::user();

            $addedby = $userinfo->id."-".$userinfo->username;

            Trainingmodel::create([

                'project'=> $project,
                'projectid'=> $projectid,
                'reportingoffice'=> $reportingoffice,
                'officecode'=> $officecode,
                'officeaddress'=> $officeaddress,
                'officecountry'=> $country,
                'officestate'=> $state,
                'officecity'=> $city,
                'trainingtitle'=> $trainingtitle,
                'category'=> $category,
                'subcategory'=> $subcategory,
                'trainingmethod'=> $trainingmethod,
                'traininglocation'=> $location,
                'locationaddress'=> $locationaddress.", ".$locationarea,
                'startdate'=> $startdate,
                'enddate'=> $enddate,
                'traininglength'=> $length,
                'numberofparticipants'=> $numberofparticipants,
                'trainerone'=> $trainerone,
                'trainertwo'=> $trainertwo,
                'trainerthree'=> $trainerthree,
                'trainerfour'=> $trainerfour,
                'info'=> $info,
                'addedby'=> $addedby

                ]);

            Session()->flash('successmsg','This Training [ '.$trainingtitle.' ] Added Successfully...!');

            return back();


        }


    }


    public function viewTraining()
    {

      $training = DB::table('training')
      ->select('training.*','training.project as projectname','trainingcategory.*','subcategory.*','trainingmethod.*')
      ->join('trainingcategory','training.category','=','trainingcategory.categoryid')
      ->join('trainingmethod','training.trainingmethod','=','trainingmethod.methodid')
      ->join('subcategory','training.subcategory','=','subcategory.subcategoryid')
      ->where('training.status',1)->get();

      return view('viewtraining',['title'=>'Training List','training'=>$training]);      

    }

    public function viewSingletraining($id)
    {

        
        $training = DB::table('training')
      ->select('training.*','training.project as projectname','trainingcategory.*','subcategory.*','trainingmethod.*')
      ->join('trainingcategory','training.category','=','trainingcategory.categoryid')
      ->join('trainingmethod','training.trainingmethod','=','trainingmethod.methodid')
      ->join('subcategory','training.subcategory','=','subcategory.subcategoryid')
      ->where(['training.id'=>$id,'training.status'=>1])->get();

        return view('trainingsingleview',['title','View Training','training'=>$training]);

    }


    public function deleteTraining($id)
    {

        Trainingmodel::where(['id'=>$id,'status'=>1])->update(['status'=>'0']);

        Session()->flash('successmsg','Training Deleted Successfully...!');

        return back(); 


    }











    
    public function codeTest()
    {
        
    
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
