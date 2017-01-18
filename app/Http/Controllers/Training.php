<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trainingmodel;

use Validator;

use DB;

use Illuminate\Support\Facades\Auth;

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
            
            $validator->errors()->add('category', 'This Category already exist...!');
            
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
    
    public function codeTest()
    {
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
