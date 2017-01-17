<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadFile;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;

use Illuminate\Filesystem\Filesystem;

use Validator;

use Image;

class Projectcontroller extends Controller
{

    public function projectaddForm()
    {

        $categories = DB::table('categories')->where('status',1)->get();

        return view('addproject',['title'=>'Add Project','categories'=>$categories]);

    }

    public function addProject(Request $request)
    {
        $message=[
          
            'editor1.required'=>'Project Description is required...!'
            
        ];

        $validator = Validator::make($request->all(),[
            
            'project_category'=>'required',
            'project_title'=>'required',
            'startdate'=>'required',
            'enddate'=>'required',
            'editor1'=>'required',
            'image'=>'required'
            
            
        ],$message);
        
        if($validator->fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('project_title','editor1'));
            
        }else
        {
            $min = 1000;

            $max = 10000000;

            $projectid =$request->input('projectid');

            $projectcategory = $request->input('project_category');

            $projecttitle = $request->input('project_title');
            
            $projectstart = $request->input('startdate');
            
            $projectend = $request->input('enddate');

            $desc = $request->input('editor1');

            $logo = $request->file('image');

            $file_name =rand($min,$max)."_".$request->file('image')->getClientOriginalName();

            $request->file('image')->move(base_path()."/storage/images/",$file_name);

            DB::table('projectdetails')->insert([
                'projectcate'=>$projectcategory,
                'projectid'=>$projectid,
                'startdate'=>$projectstart,
                'enddate'=>$projectend,
                'title'=>$projecttitle,
                'description'=>$desc,
                'logo'=>$file_name,
                'created_at'=>date('y-m-d h:i:s')

            ]);

            Session()->flash('successmsg',"[$projecttitle] Project Added Successfully...!");

            return back();
            
        }

    }




    public function addProjectcategory(Request $request)
    {
        $message = [

            'unique'=>'The Catergory You add its already exist...!'

        ];
        $validator = Validator::make($request->all(),[

            'cattitle'=>'required|unique:categories',
            'shortdescription'=>'required'

        ],$message);

        if($validator->fails())
        {

            return back()->withErrors($validator);

        }else
        {

            $title = $request->input('cattitle');
            
            $shortdesc = $request->input('shortdescription');

            $catid = rand(10000,100000);

            DB::table('categories')->insert(['catid'=>$catid,'cattitle'=>$title,'shortdescription'=>$shortdesc,'created_at'=>date('y-m-d h:i:s')]);

            Session()->flash('successmsg',"[$title] Category Added Successfully...!");

            return back();

        }

    }



    public function viewProject()
    {
        
        $projectlist = DB::table('projectdetails')->where('status',1)->get();
        
        return view('viewproject',['title'=>'View Project List','plist'=>$projectlist]);
        
    }


    public function projectSingleview($projectid)
    {
        
        $id = $projectid;
        
        $details = DB::table('projectdetails')->where(['id'=>$id,'status'=>1])->get();
        
        return view('projectsingleview',['title'=>'Project Details','pdetail'=>$details]);
        
        
    }


    public function deleteProject($projectid)
    {
        
        $id = $projectid;
        
        $date = date('y-m-d h:i:s');
        
        DB::table('projectdetails')->where('id',$id)->update(['status'=>0,'updated_at'=>$date]);
        
        Session()->flash('successmsg','Project Deleted Successfully...!');
        
        return redirect('project/view');
        
    }

    
    public function editProject($projectid)
    {
        
        $categories = DB::table('categories')->where('status',1)->get();
        
        $projectdetails = DB::table('projectdetails')->where('id',$projectid)->get();
        
        return view('projectedit',['title'=>'Edit Project','categories'=>$categories,'pdetails'=>$projectdetails]);  
        
    }
    

    public function editprojectaction(Request $request)
    {
        
        $message=[
          
            'editor1.required'=>'Project Description is required...!'
            
        ];

        $validator = Validator::make($request->all(),[
            
            'project_category'=>'required',
            'project_title'=>'required',
            'startdate'=>'required',
            'enddate'=>'required',
            'editor1'=>'required'            
            
        ],$message);
        
        if($validator->fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('project_title','editor1'));
            
        }else
        {
            $min = 1000;

            $max = 10000000;

            $projectid =$request->input('projectid');

            $projectcategory = $request->input('project_category');

            $projecttitle = $request->input('project_title');
            
            $projectstart = $request->input('startdate');
            
            $projectend = $request->input('enddate');

            $desc = $request->input('editor1');

            $logo = $request->file('image');
            
            if ($request->hasFile('image'))
            {
                
            $file_name =rand($min,$max)."_".$request->file('image')->getClientOriginalName();

            $request->file('image')->move(base_path()."/storage/images/",$file_name);            
                
            $oldimage = $request->input('oldimage');   
                
            Storage::disk('image')->delete($oldimage);     
                
            }else{
                
                $file_name = $request->input('oldimage');
                
            }
            


            DB::table('projectdetails')->where('projectid',$projectid)->update([
                'projectcate'=>$projectcategory,
                'projectid'=>$projectid,
                'startdate'=>$projectstart,
                'enddate'=>$projectend,
                'title'=>$projecttitle,
                'description'=>$desc,
                'logo'=>$file_name,
                'updated_at'=>date('y-m-d h:i:s')

            ]);

            Session()->flash('successmsg',"[$projecttitle] Project Updated Successfully...!");

           return back();
            
        }

        
    }
    
    
    
    
    
    public function categoryList()
    {
        
        $categories = DB::table('categories')->where('status',1)->get();
        
        return view('categorylist',['title'=>'Project Categories','plist'=>$categories]);
        
        
    }
    
    
    public function categoryDelete($categoryid)
    {
        
        DB::table('categories')->where('catid',$categoryid)->update(['status'=>'0']);
        
        Session()->flash('successmsg',"Project Deleted Successfully...!");
        
        return back();
        
    }
    
    
    public function settingsPage($projectid)
    {
        
        $project = DB::table('projectdetails')->where('projectid',$projectid)->get();
        
        $workingarea = DB::table('country')->where('status',1)->get();
        
         $result = DB::table('country')->where(['projectid'=>$projectid,'status'=>1])->distinct();
        
         $country = $result->select('countryid','country')->get();
        
         $state = $result->select('stateid','state')->get();
        
         $city = $result->select('cityid','city')->get();
        
         $targetedplace = DB::table('targetedplace')->where('status',1)->get(); 
        
         $office = DB::table('office')->where('status',1)->get();
        
         
        
        return view('settingsproject',['title'=>'Project Settings',
                                       'projectdetail'=>$project,
                                        'workingarea'=>$workingarea,
                                        'country'=>$country,
                                        'state'=>$state,
                                        'city'=>$city,
                                        'placelist'=>$targetedplace,
                                        'office'=>$office
                                      ]);
        
    }
    
    public function addworkingArea(Request $request)
    {
        $message = [
            
            'city.unique'=>'That City is already exist...!'
            
        ];
        
        $validator = Validator::make($request->all(),[
            
            'country'=>'required',
            'state'=>'required',
            'city'=>'required|unique:country'
            
            
            
        ],$message);
        
        if($validator->Fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('state','city'));
            
        }else{
            
            
            $projectname = $request->input('projecttitle');
            
            $projectid = $request->input('projectid');
            
            $countryname = $request->input('countrytext');
            
            $countryid = $request->input('country');
            
            $statename = $request->input('state');
            
            $cityname = $request->input('city');
            
            $cityid = rand(5001,10000);
            
            $info = $request->input('info');
            
            $created_at = date('y-m-d h:i:s');
            
            $result=DB::table('country')->where('state',$statename)->get();
            
            $count = $result->count();
            
            if($count>0)
            {
                $stateid = $result[0]->stateid;
                
            }else{
                
                $stateid = rand(1,5000);
            }
            
                
            DB::table('country')->insert([
                
                
                'projectid'=>$projectid,
                'projectname'=>$projectname,
                'countryid'=>$countryid,
                'country'=>$countryname,
                'stateid'=>$stateid,
                'state'=>$statename,
                'cityid'=>$cityid,
                'city'=>$cityname,
                'info'=>$info,
                'created_at'=>$created_at,
                
                
                
            ]);
            
            Session()->flash('successmsg','Working Area added Successfully...!');
            
            return back();
            
            
            
            
        }
        
        
    }
    
    
    public function deleteCity($id)
    {
        
        DB::table('country')->where('id',$id)->update(['status'=>'0']);
        
        Session()->flash('deletemsg','Working Area Deleted Successfully...!');
        
        return back();
        
    }
    
    
    public function addTargetedplace(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'targetedplace'=>'required|unique:targetedplace',
            'category'=>'required',
            'address'=>'required',
            'selectedcountry'=>'required',
            'selectedstate'=>'required',
            'selectedcity'=>'required'  
        ],['targetedplace.unique'=>'This Targeted Place Already Exist..!']);
        
        if($validator->Fails())
        {
            
            return back()->withErrors($validator)->withInput($request->flashOnly('targetedplace','category','address','postalcode','email','telephone','longnlat','info'));
            
        }else{
            
            $projectname = $request->input('projecttitle');
            $projectid = $request->input('projectid');
            $title = $request->input('targetedplace');
            $category = $request->input('category');
            $address = $request->input('address');
            $postalcode = $request->input('postalcode');
            $email = $request->input('email');
            $telephone = $request->input('telephone');
            $country = $request->input('selectedcountry');
            $state = $request->input('selectedstate');
            $city = $request->input('selectedcity');
            $longnlat = $request->input('longnlat');
            $info = $request->input('info');
            $createdat = date('y-m-d h:i:s');
            
            $facilityid = rand(500001,9000000);
            
            
            $expcountry = explode("-",$country);
            $expstate = explode("-",$state);
            $expcity = explode("-",$city);
            
            $checkarea = DB::table('country')->where(['country'=>$expcountry[1],
                                                      'state'=>$expstate[1],
                                                      'city'=>$expcity[1]]    
                                                    )->count();
            if($checkarea>0)
            {
                
            $result=DB::table('targetedplace')->where('category',$category)->get();
            
            $count = $result->count();
            
            if($count>0)
            {
                $categoryid = $result[0]->categoryid;
                
            }else{
                
                $categoryid = rand(100001,200000);
            }
                
            DB::table('targetedplace')->insert([
                
                'projectid'=>$projectid,
                'projectname'=>$projectname,
                'facilityid'=>$facilityid,
                'targetedplace'=>$title,
                'categoryid'=>$categoryid,
                'category'=>$category,
                'address'=>$address,
                'postalcode'=>$postalcode,
                'email'=>$email,
                'telephone'=>$telephone,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'longnlat'=>$longnlat,
                'info'=>$info,
                'created_at'=>$createdat
                
            ]);
            
            Session()->flash('successmsgx','Targeted Working Area Successfully Added...!');
            
            return back();  
                
                
                
                
                
                
                
                
                
                
            }else{
                
               Session()->flash('customerror','Invalid State and City Selected...!'); 
                
               return back();    
                
            }
            
            

            
        }
        
        
        
    }
    
    
    
    public function addOffice(Request $request)        
    {
        
        $validator = Validator::make($request->all(),[
            
                'branch'=>'required|unique:office',
                'branchcode'=>'required',
                'address'=>'required',
                'postalcode'=>'required',
                'telephone'=>'required',
                'officecountry'=>'required',
                'officestate'=>'required',
                'officecity'=>'required',
            
        ],[
            
            'branch.unique'=>'This Branch is Already Exist...! '
            
        ]);
        
        if($validator->Fails())
        {
            
        return back()->withErrors($validator)->withInput($request->flashOnly('branch','branchcode','address','postalcode','fax','telephone','taluka','unioncouncil','longnlat','info'));
            
        }else
        {
            
        $projectid    = $request->input('projectid');
        $projectname  = $request->input('projecttitle');
        $branchcode   = $request->input('branchcode');
        $branch       = $request->input('branch');
        $address      = $request->input('address');
        $postalcode   = $request->input('postalcode');
        $fax          = $request->input('fax');
        $telephone    = $request->input('telephone');
        $country      = $request->input('officecountry');
        $state        = $request->input('officestate');
        $city         = $request->input('officecity');
        $taluka       = $request->input('taluka');
        $uc           = $request->input('uc');
        $longnlat     = $request->input('longnlat');
        $info         = $request->input('info');
        $addedby      = $request->input('addedby');    
        $createdat    = date('y-m-d h:i:s');
            
            
        DB::table('office')->insert([
           
            'projectid'=>$projectid  ,
            'projectname'=>$projectname  ,
            'branchcode'=>$branchcode  ,
            'branch'=>$branch  ,
            'address'=>$address  ,
            'postalcode'=>$postalcode  ,
            'fax'=>$fax  ,
            'telephone'=>$telephone  ,
            'country'=>$country  ,
            'state'=>$state  ,
            'city'=>$city  ,
            'taluka'=>$taluka  ,
            'uc'=>$uc  ,
            'longnlat'=>$longnlat  ,
            'info'=> $info ,
            'addedby'=>$addedby  ,
            'created_at'=> $createdat            
            
            
        ]);    
            
        Session()->flash('successmsgy','Office Details Added Successfully...!');
            
        return back();    
            
        }
        
        
    }
    
    
    
    public function deleteTarget($id)
    {
        
        DB::table('targetedplace')->where('id',$id)->update(['status'=>'0']);
        
        Session()->flash('deletetargetmsg','Targeted place Deleted Successfully...!');
        
        return back();
        
    }
    
    public function deleteOffice($id)
    {
        
        DB::table('office')->where('id',$id)->update(['status'=>'0']);
        
        Session()->flash('deleteofficemsg','Office Details Deleted Successfully...!');
        
        return back();
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
