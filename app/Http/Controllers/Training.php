<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trainingmodel;

use Validator;

use DB;

use Illuminate\Support\Facades\Auth;

use App\profession;

use App\office;

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
    
    $trainingcategories = DB::table('trainingcategory')->where('status',1)->get();
        
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
        $subcat = DB::table('subcategory')->where('status',1)->get();
        
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

        $methods = DB::table('trainingmethod')->where('status',1)->get();

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


    
    public function codeTest()
    {
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
