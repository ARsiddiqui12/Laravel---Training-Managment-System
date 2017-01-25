@extends('layouts.master')

@push('css')

<link href="{!! asset('theme/assets/global/plugins/select2/css/select2.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') !!}" rel="stylesheet" type="text/css" />

<link href="{!! asset('theme/assets/global/plugins/datatables/datatables.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')!!}" rel="stylesheet" type="text/css" />

<style type="text/css">
  
  label.error{

    color:red;
    padding: 0px;
    margin: 0px;
  }

</style>        


@endpush



@section('content')



    <div class="container-fluid">
        <div class="page-content">
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
                <h1 style="text-transform: none;">Training Registration Form</h1>
                <ol class="breadcrumb">
                    <li>
                        Home
                    </li>
                    <li>
                        Training
                    </li>
                    <li class="active">Add Training</li>
                </ol>
                <!-- Sidebar Toggle Button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                </button>
                <!-- Sidebar Toggle Button -->
            </div>
            <!-- END BREADCRUMBS -->
            <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
            <div class="page-content-container">
                <div class="page-content-row">
                    
                    <div class="page-content-col">
                        <!-- BEGIN PAGE BASE CONTENT -->

                        <div class="row">

                            <div class="col-md-12">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Add new Training</span>
                                        </div>

                                    </div>
                                    
                                    <div class="portlet-body">
                                        @if(Session('successmsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('successmsg') }}</div>
                                            </div>

                                        @endif
                                        
                                        
                                      

                                        <!-- BEGIN FORM-->
                                        <form action="{{route('training.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="trainingform">
                                            
                                            {{ csrf_field() }}
                                            
                                            <div class="form-body" style="padding: 0px !important;">
                                            
                                            <div class="form-group">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8" style="border:1px solid #eef1f5; padding:10px;">
                                            
                                            <div class="row">
                                            <div class="col-md-12">
                                                <br>
                                                <h3 style="margin:0px;">Project Information</h3>
                                                <hr>

                                            </div>
                                            </div>

                                            <div class="row">
                                             <div class="col-md-6">
                                               <label>Project Name<span style="color:red;">*</span></label><a href="javascript:;"  data-toggle="modal" data-target="#projectselector"  data-backdrop="static" data-keyboard="false" class="pull-right">Select</a>   
 <input type="text" class="form-control readonly"  placeholder="Select Project" name="projectname" id="projectname" value="{{old('projectname')}}" required readonly>
                                             
                                                @if($errors->has('projectname'))
                                                <span style="color:red;">{{$errors->first('projectname')}}</span>
                                                @endif   
                                                
                                             </div>
                                             
                                             <div class="col-md-6">
                                                 <label>Project Code <span style="color:green;"><sup>Auto</sup></span></label>
 <input type="text" value="{{old('projectid')}}" class="form-control" placeholder="Project Code" id="projectid" name="projectid" required="required" readonly="readonly">
                                             
                                                @if($errors->has('projectid'))
                                                <span style="color:red;">{{$errors->first('projectid')}}</span>
                                                @endif    

                                             </div>   
                                             </div>

                                             <div class="row">
                                             <div class="col-md-6">
                                                 <br><label>Select Reporting Office <span style="color:red;">*</span></label>
                                                 <a href="javascript:;" id="selectproject" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#officeselector" class="pull-right">Select</a>  
                                              <input type="text" value="{{old('office')}}" class="form-control" placeholder="Select Reporting Office" name="office" id="officename" required="required" readonly="readonly">
                                             
                                                @if($errors->has('office'))
                                                <span style="color:red;">{{$errors->first('office')}}</span>
                                                @endif    

                                             </div> 
                                             
                                             <div class="col-md-6">
                                             
                                                <br> <label>Office / Branch Code <span style="color:green;"><sup>Auto</sup></label>
                                            
                                            
            <input type="text" class="form-control" placeholder="Office / Branch Code" value="{{old('officecode')}}" name="officecode" id="officecode" required="required" readonly="readonly">
            
                                                @if($errors->has('officecode'))
                                                <span style="color:red;">{{$errors->first('officecode')}}</span>
                                                @endif    
                                                </div>
                                           </div>

                                                <div class="row">
                                             <div class="col-md-6">

                                                <br><label>Office Address <span style="color:green;"><sup>Auto</sup></label>
                                                
                                             <input type="text" name="address" placeholder="Address" value="{{old('address')}}" class="form-control" id="officeaddress" required="required" readonly="readonly"> 

                                                @if($errors->has('address'))
                                                <span style="color:red;">{{$errors->first('address')}}</span>
                                                @endif    

                                             </div> 

                                             <div class="col-md-6">
                                                <br><label>Country / State / City  <span style="color:green;"><sup>Auto</sup></label>
                                              <input type="text" value="{{old('csc')}}" class="form-control" placeholder="Country / State / City" name="csc" id="officecity" required="required" readonly="readonly">
                                             
                                                @if($errors->has('csc'))
                                                <span style="color:red;">{{$errors->first('csc')}}</span>
                                                @endif    

                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-12"><hr>
                                                <h3 style="margin:0px;">Training Information</h3>
                                                
                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-12"><br>
                                               
                                             Training Title <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('trainingtitle')}}" class="form-control" placeholder="Training Title" name="trainingtitle" required="required">
                                             
                                                @if($errors->has('trainingtitle'))
                                                <span style="color:red;">{{$errors->first('trainingtitle')}}</span>
                                                @endif    

                                             </div>
                                             </div>


                                             <div class="row">

                                             <div class="col-md-6">
                                                <br><label>Category <span style="color:red;">*</span></label>
                                                <select class="form-control" id="maincategory" name="category" required="required">
                                                
                                                <option value="" selected="selected">Select Category</option>  

                                                

                                                </select>

                                                <label style="color:red;" id="categoryerror">Category not found in Selected Project please contact to "<b>System Admin</b>".</label>


                                                @if($errors->has('category'))
                                                <span style="color:red;">{{$errors->first('category')}}</span>
                                                @endif    

                                             </div>


                                             <div class="col-md-6">
                                                <br><label>Sub-Category <span style="color:red;">*</span></label>
                                                <select class="form-control" id="subcategory" name="subcategory" required="required">
                                                
                                                <option value="" selected="selected">Select Sub-Category</option>  

                                                
                                                </select>
                                                <label id="subcaterror" style="color:red;">Sub-Category not found please contact to "<b>System Admin</b>".</label>

                                                @if($errors->has('subcategory'))
                                                <span style="color:red;">{{$errors->first('subcategory')}}</span>
                                                @endif    

                                             </div>

                                             </div>

                                             <div class="row">
                                             <div class="col-md-6">

                                                <br> <label>Training Method <span style="color:red;">*</span></label>
                                                
                                                <select class="form-control" id="method" name="trainingmethod" required>
                                                    
                                                    <option value="" selected>Select Training Method</option>

                                                    

                                                </select>

                                                <label style="color:red;" id="methoderror">Training Method not found in Selected Project please contact to "<b>System Admin</b>".</label>
                                                @if($errors->has('trainingmethod'))
                                                <span style="color:red;">{{$errors->first('trainingmethod')}}</span>
                                                @endif    

                                             </div> 


                                             <div class="col-md-6">

                                                <br> <label>Training Location <span style="color:red;">*</span></label><a href="javascript:;" id="" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#locationselector" class="pull-right">Select</a>   
                                                
                                                <input type="text" name="location" value="{{old('location')}}" readonly="readonly" required="required" id="locationname" placeholder="Training Location" class="form-control">

                                                @if($errors->has('location'))
                                                <span style="color:red;">{{$errors->first('location')}}</span>
                                                @endif    

                                             </div> 

                                             </div>

                                             <div class="row">

                                             <div class="col-md-6">

                                                <br> <label>Location Address <span style="color:green;"><sup>Auto</sup></span></label>
                                                <input type="text" name="locationaddress" id="locationaddress" value="{{old('locationaddress')}}" readonly="readonly" placeholder="Training Location Address" class="form-control">

                                                @if($errors->has('locationaddress'))
                                                <span style="color:red;">{{$errors->first('locationaddress')}}</span>
                                                @endif    

                                             </div> 

                                             <div class="col-md-6">

                                                <br> <label>Location Country / State / City <span style="color:green;"><sup>Auto</sup></span></label>
                                                <input type="text" name="locationarea" id="locationarea" value="{{old('locationarea')}}" readonly="readonly" placeholder="Location Country / State / City" class="form-control">
                                                <input type="hidden" id="locationid" value="{{old('locationid')}}" name="locationid">
                                                @if($errors->has('locationarea'))
                                                <span style="color:red;">{{$errors->first('locationarea')}}</span>
                                                @endif    

                                             </div> 

                                             </div>



                                             <div class="row">
                                             <div class="col-md-6">
                                               <br> 

                                               <label>Training Starting Date</label>    
                                
            <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
            <input type="text" class="form-control" placeholder="Training Starting Date" name="startdate" required="required">
            <span class="input-group-btn">
            <button class="btn default" type="button">
            <i class="fa fa-calendar"></i>
            </button>
            </span>
            </div>


                                                @if($errors->has('startdate'))
                                                <span style="color:red;">{{$errors->first('startdate')}}</span>
                                                @endif    

                                             </div>

                                             <div class="col-md-6">
                                               <br> 

                                               <label>Training Ending Date</label>    
                                
                                 <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
            <input type="text" class="form-control" placeholder="Training Ending Date" name="enddate" required>
            <span class="input-group-btn">
            <button class="btn default" type="button">
            <i class="fa fa-calendar"></i>
            </button>
            </span>
            </div>
                                             
                                             @if($errors->has('enddate'))
                                                <span style="color:red;">{{$errors->first('enddate')}}</span>
                                                @endif 
                                                 

                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-6">
                                                 <br><label>Training Length <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('length')}}" class="form-control" placeholder="5 Hours / Days / Weeks" name="length" required="required" >
                                             
                                                @if($errors->has('length'))
                                                <span style="color:red;">{{$errors->first('length')}}</span>
                                                @endif    

                                             </div>  

                                             <div class="col-md-6">
                                                 <br><label>Number Of Participants<span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('numberofparticipants')}}" class="form-control" placeholder="Number Of Participants" name="numberofparticipants" required="required" >
                                             
                                                @if($errors->has('numberofparticipants'))
                                                <span style="color:red;">{{$errors->first('numberofparticipants')}}</span>
                                                @endif    

                                             </div> 
                                             </div>
                                             <div class="row">
                                             <div class="col-md-12">
                                                <hr>
                                                <h3 style="margin:0px;">Trainers Information</h3>
                                                

                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">

                                                <br><label>Trainer One <span style="color:red;">*</span></label>
                                                <a href="javascript:;" id="1" data-backdrop="static" data-keyboard="false"  class="pull-right trainermodalbtn">Select</a>   
  <input type="text" name="trainerone" id="trainerone" placeholder="Trainer One" value="{{old('trainerone')}}" class="form-control" required="required" readonly="readonly"> 

                                                @if($errors->has('trainerone'))
                                                <span style="color:red;">{{$errors->first('trainerone')}}</span>
                                                @endif    

                                             </div> 

                                             <div class="col-md-6">

                                                <br><label>Trainer Two <span style="color:green;">( Optional )</span></label>
                                                
                                                <a href="javascript:;" id="2" data-backdrop="static" data-keyboard="false"  class="pull-right trainermodalbtn">Select</a>  

                                             <input type="text" name="trainertwo" id="trainertwo" placeholder="Trainer Two ( Optional )" value="{{old('trainertwo')}}" class="form-control"  readonly="readonly"> 

                                                @if($errors->has('trainertwo'))
                                                <span style="color:red;">{{$errors->first('trainertwo')}}</span>
                                                @endif    

                                             </div> 
                                             </div>

                                             <div class="row">

                                             <div class="col-md-6">

                                                <br><label>Trainer Three <span style="color:green;">( Optional )</span></label>
                                                
                                                <a href="javascript:;" id="3" data-backdrop="static" data-keyboard="false"  class="pull-right trainermodalbtn">Select</a>   


                                             <input type="text" name="trainerthree" id="trainerthree" placeholder="Trainer Three ( Optional )" value="{{old('trainerthree')}}" class="form-control"  readonly="readonly"> 

                                                @if($errors->has('trainerthree'))
                                                <span style="color:red;">{{$errors->first('trainerthree')}}</span>
                                                @endif    

                                             </div> 

                                             <div class="col-md-6">

                                                <br><label>Trainer Four <span style="color:green;">( Optional )</span></label>
                                                
                                                <a href="javascript:;" id="4" data-backdrop="static" data-keyboard="false"  class="pull-right trainermodalbtn">Select</a>  


                                             <input type="text" name="trainerfour" id="trainerfour" placeholder="Trainer Three ( Optional )" value="{{old('trainerfour')}}" class="form-control"  readonly="readonly"> 

                                                @if($errors->has('trainerfour'))
                                                <span style="color:red;">{{$errors->first('trainerfour')}}</span>
                                                @endif    

                                             </div> 

                                             </div>

                                             <div class="row">
                                             <div class="col-md-12">
                                               <br> <label>Additional Information <span style="color:green;">( Optional )</span></label>
                                              <textarea class="form-control" placeholder="Describe About Training Organizers , Trainers and Participants" name="info"></textarea>

                                             </div>
                                             </div>

                                            


                                              



                                             













                                            </div>
                                            <div class="col-md-2"></div>
                                            </div>    




                                            </div>
                                                
                                                
                         
                                            
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12"><center>
                                                        <button type="submit" class="btn green">Register</button>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <button type="reset" class="btn default">Cancel</button>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        </div>
                                        <!-- END FORM-->
                                   
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                        
                        
                        
                        <!-- END PAGE BASE CONTENT -->
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR CONTENT LAYOUT -->
        </div>
        <!-- BEGIN FOOTER -->
        <p class="copyright"> 
             2017 &copy; TRAIN SMART By ABDUL REHMAN
        </p>
<!--
        <a href="#index" class="go2top">
            <i class="icon-arrow-up"></i>
        </a>
-->
        <!-- END FOOTER -->
    </div>
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>
    <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
        <div class="page-quick-sidebar">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                        <span class="badge badge-danger">2</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                        <span class="badge badge-success">7</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-bell"></i> Alerts </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-info"></i> Notifications </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-speech"></i> Activities </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-settings"></i> Settings </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                    <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                        <h3 class="list-heading">Staff</h3>
                        <ul class="media-list list-items">
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-success">8</span>
                                </div>
                                <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Bob Nilson</h4>
                                    <div class="media-heading-sub"> Project Manager </div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Nick Larson</h4>
                                    <div class="media-heading-sub"> Art Director </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-danger">3</span>
                                </div>
                                <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Deon Hubert</h4>
                                    <div class="media-heading-sub"> CTO </div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Ella Wong</h4>
                                    <div class="media-heading-sub"> CEO </div>
                                </div>
                            </li>
                        </ul>
                        <h3 class="list-heading">Customers</h3>
                        <ul class="media-list list-items">
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-warning">2</span>
                                </div>
                                <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Lara Kunis</h4>
                                    <div class="media-heading-sub"> CEO, Loop Inc </div>
                                    <div class="media-heading-small"> Last seen 03:10 AM </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="label label-sm label-success">new</span>
                                </div>
                                <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Ernie Kyllonen</h4>
                                    <div class="media-heading-sub"> Project Manager,
                                        <br> SmartBizz PTL </div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Lisa Stone</h4>
                                    <div class="media-heading-sub"> CTO, Keort Inc </div>
                                    <div class="media-heading-small"> Last seen 13:10 PM </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-success">7</span>
                                </div>
                                <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Deon Portalatin</h4>
                                    <div class="media-heading-sub"> CFO, H&D LTD </div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Irina Savikova</h4>
                                    <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-danger">4</span>
                                </div>
                                <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Maria Gomez</h4>
                                    <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                    <div class="media-heading-small"> Last seen 03:10 AM </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="page-quick-sidebar-item">
                        <div class="page-quick-sidebar-chat-user">
                            <div class="page-quick-sidebar-nav">
                                <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                    <i class="icon-arrow-left"></i>Back</a>
                            </div>
                            <div class="page-quick-sidebar-chat-user-messages">
                                <div class="post out">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:15</span>
                                        <span class="body"> When could you send me the report ? </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:15</span>
                                        <span class="body"> Its almost done. I will be sending it shortly </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:15</span>
                                        <span class="body"> Alright. Thanks! :) </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:16</span>
                                        <span class="body"> You are most welcome. Sorry for the delay. </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:17</span>
                                        <span class="body"> No probs. Just take your time :) </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:40</span>
                                        <span class="body"> Alright. I just emailed it to you. </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:17</span>
                                        <span class="body"> Great! Thanks. Will check it right away. </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:40</span>
                                        <span class="body"> Please let me know if you have any comment. </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:17</span>
                                        <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                    </div>
                                </div>
                            </div>
                            <div class="page-quick-sidebar-chat-user-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type a message here...">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn green">
                                            <i class="icon-paper-clip"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                    <div class="page-quick-sidebar-alerts-list">
                        <h3 class="list-heading">General</h3>
                        <ul class="feeds list-items">
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 4 pending tasks.
                                                <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> Just now </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Finance Report for year 2013 has been released. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> New order received with
                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 30 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                <span class="label label-sm label-warning"> Overdue </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 2 hours </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> IPO Report for year 2013 has been released. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <h3 class="list-heading">System</h3>
                        <ul class="feeds list-items">
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 4 pending tasks.
                                                <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> Just now </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Finance Report for year 2013 has been released. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> New order received with
                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 30 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                <span class="label label-sm label-default "> Overdue </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 2 hours </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> IPO Report for year 2013 has been released. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                    <div class="page-quick-sidebar-settings-list">
                        <h3 class="list-heading">General Settings</h3>
                        <ul class="list-items borderless">
                            <li> Enable Notifications
                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            <li> Allow Tracking
                                <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            <li> Log Errors
                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            <li> Auto Sumbit Issues
                                <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            <li> Enable SMS Alerts
                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        </ul>
                        <h3 class="list-heading">System Settings</h3>
                        <ul class="list-items borderless">
                            <li> Security Level
                                <select class="form-control input-inline input-sm input-small">
                                    <option value="1">Normal</option>
                                    <option value="2" selected>Medium</option>
                                    <option value="e">High</option>
                                </select>
                            </li>
                            <li> Failed Email Attempts
                                <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                            <li> Secondary SMTP Port
                                <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                            <li> Notify On System Error
                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            <li> Notify On SMTP Error
                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        </ul>
                        <div class="inner-content">
                            <button class="btn btn-success">
                                <i class="icon-settings"></i> Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICK SIDEBAR -->
    


<!-- Add Profession Start -->




<div class="modal fade" id="projectselector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Select Project</strong></h4>
      </div>
      
      <div class="modal-body">


       <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                S.No
                                                            </th>
                                                            <th> Project Category </th>
                                                            <th> Project Id </th>
                                                            <th> Project Name </th>
                                
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
<tbody>
                                                        
    <?php $var = 1; ?>
    
    @forelse($project as $recordone)
    
    <tr class="odd gradeX">
        
    <td>{{$var}}</td>
    <td><?php $projectcate = explode("-", $recordone->projectcate); ?>{{$projectcate[1]}}</td>
    <td>{{$recordone->projectid}}</td>
    <td>{{$recordone->title}}</td>    
    <td>
    <div class="btn-group">
    <button class="btn btn-xs btn-info projectselectbtn" id="{{$recordone->projectid}}" name="{{$recordone->title}}"><i class="fa fa-check"></i> Select 
    </button>
    
    </div>
                                                            </td>
                                                        </tr>
    
    <?php $var++; ?>
@empty
    
    
<tr class="odd gradeX">
    
    <td colspan="6">
        <div class="alert alert-info">
        <strong>Record Not Found...!</strong>
        </div>
    </td>
    
</tr>
    
    
@endforelse    
                                                                                                    
</tbody>
                                                </table> 
      
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      
    </div>
  </div>
</div>
















<!-- Add profession end -->




<!-- Select Office -->



<div class="modal fade" id="officeselector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Select Project Office</strong></h4>
      </div>

      <div class="modal-body">

       <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                S.No
                                                            </th>
                                                            <th> Office Id </th>
                                                            <th> Office </th>
                                                            <th> Address </th>
                                
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
<tbody>
                                                        
    <?php $var = 1; ?>
    
    @forelse($office as $record)
    
    <tr class="odd gradeX">
        
    <td>{{$var}}</td>
        
    <td>{{$record->branchcode}}</td>
    
    <td>{{$record->branch}}</td>
    <td>
    {{$record->address}}, <?php 
    $country = explode("-", $record->country);
    $state = explode("-", $record->state);
    $city = explode("-", $record->city); ?>
    {{$country[1]." / ".$state[1]." / ".$city[1]}}
    </td>    
   
    
    <td>
    <div class="btn-group">
    <button class="btn btn-xs btn-info officeselectorbtn" id="{{$record->branchcode}}" name="{{$record->branch}}" address="{{$record->address}}" area="{{$country[1].' / '.$state[1].' / '.$city[1]}}"><i class="fa fa-check"></i> Select 
    </button>
    
    </div>
                                                            </td>
                                                        </tr>
    
    <?php $var++; ?>
@empty
    
    
<tr class="odd gradeX">
    
    <td colspan="6">
        <div class="alert alert-info">
        <strong>Record Not Found...!</strong>
        </div>
    </td>
    
</tr>
    
    
@endforelse    
                                                                                                    
</tbody>
                                                </table> 

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
      
    </div>
  </div>
</div>











<!-- Select office -->


<!-- Select Training Location -->


<div class="modal fade" id="locationselector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">

        <strong>Select Training Location</strong>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{url('training/addlocation')}}" class="btn btn-info "><i class="fa fa-plus"></i> Add New</a>


        </h4>
        
      </div>

      <div class="modal-body">

       <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_3">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                S.No
                                                            </th>
                                                            <th> Location Name </th>
                                                            <th> Location Category </th>
                                                            <th> Address </th>
                                
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
<tbody>
                                                        
    <?php $var = 1; ?>
    
    @forelse($location as $record)
    
    <tr class="odd gradeX">
        
    <td>{{$var}}</td>
        
    <td>{{$record->location}}</td>
    
    <td>{{$record->category}}</td>
    <td>
    {{$record->address}}, <?php 
    $country = explode("-", $record->country);
    $state = explode("-", $record->state);
    $city = explode("-", $record->city); ?>
    {{$country[1]." / ".$state[1]." / ".$city[1]}}
    </td>    
   
    
    <td>
    <div class="btn-group">
    <button class="btn btn-xs btn-info locationselectorbtn" id="{{$record->locationid}}" name="{{$record->location}}" address="{{$record->address}}" area="{{$country[1].' / '.$state[1].' / '.$city[1]}}"><i class="fa fa-check"></i> Select 
    </button>
    
    </div>
                                                            </td>
                                                        </tr>
    
    <?php $var++; ?>
@empty
    
    
<tr class="odd gradeX">
    
    <td colspan="6">
        <div class="alert alert-info">
        <strong>Record Not Found...!</strong>
        </div>
    </td>
    
</tr>
    
    
@endforelse    
                                                                                                    
</tbody>
                                                </table> 

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
      
    </div>
  </div>
</div>







<!-- Select Training Location -->



<!-- Select Trainer -->




<div class="modal fade" tabindex="-1" id="trainermodal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">

        <strong>Select Trainer</strong>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{url('training/addtrainer')}}" class="btn btn-info "><i class="fa fa-plus"></i> Add New</a>


        </h4>
        
      </div>

      <div class="modal-body">
<input type="hidden" id="tid">
       <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_4">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                S.No
                                                            </th>
                                                            <th> Trainer Name </th>
                                                            <th> Trainer Type </th>
                                                            <th> Trainer Level </th>
                                                            <th>Reporting Office</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
<tbody>
                                                        
    <?php $var = 1; ?>
    
    @forelse($trainer as $record)
    
    <tr class="odd gradeX">
        
    <td>{{$var}}</td>
        
    <td>{{$record->trainername." ".$record->surname}}</td>
    
    <td>{{$record->trainertype}}</td>

    <td>{{$record->trainerlevel}}</td>
    <td>
    {{$record->reportingoffice}},{{$record->officeaddress}}
    </td>    
   
    
    <td>
    <div class="btn-group">
    <button class="btn btn-xs btn-info trainerselectorbtn" id="{{$record->trainername.' '.$record->surname}}"><i class="fa fa-check"></i> Select 
    </button>
    
    </div>
                                                            </td>
                                                        </tr>
    
    <?php $var++; ?>
@empty
    
    
<tr class="odd gradeX">
    
    <td colspan="6">
        <div class="alert alert-info">
        <strong>Record Not Found...!</strong>
        </div>
    </td>
    
</tr>
    
    
@endforelse    
                                                                                                    
</tbody>
                                                </table> 

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
      
    </div>
  </div>
</div>



















<!-- Select Trainer -->



@endsection




































@push('js')

<script src="{!! asset('theme/assets/global/plugins/select2/js/select2.full.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/jquery-validation/js/additional-methods.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/ckeditor/ckeditor.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/bootstrap-markdown/lib/markdown.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')!!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/pages/scripts/form-validation.min.js')!!}" type="text/javascript"></script>


<script src="{!! asset('theme/assets/global/plugins/datatables/datatables.min.js')!!}" type="text/javascript"></script>

<script src="{!!asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')!!}" type="text/javascript"></script>

<script src="{!! asset('theme/assets/pages/scripts/table-datatables-managed.min.js')!!}" type="text/javascript"></script>


 <script src="{!! asset('theme/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('theme/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') !!}" type="text/javascript"></script>

<script type="text/javascript">
    
$(document).ready(function(){



  $("#subcaterror").hide();

  $("#methoderror").hide();

  $("#categoryerror").hide();




    $("#trainingform").validate({


      submitHandler: function(form) {
    $(form).ajaxSubmit();
  }


    });

// $("#mask_phone").inputmask("9999-9999999");

// $("#cnic").inputmask("99999-9999999-9");




$('#sample_1').DataTable({
        
         
        "pageLength": 12,
             
        
    });

$('#sample_2').DataTable({
        
         
        "pageLength": 12,
             
        
    });

$('#sample_3').DataTable({
        
         
        "pageLength": 12,
             
        
    });

$('#sample_4').DataTable({
        
         
        "pageLength": 12,
             
        
    });

$(".projectselectbtn").click(function(){

$(".optcategory").remove();

$(".optmethod").remove();

var projectid = $(this).attr("id");

var projectname = $(this).attr("name");

$("#projectid").val(projectid);

$("#projectname").val(projectname);

$("#projectselector").modal('hide');

token = $('input[name=_token]').val();

var data = {projectid: projectid};

$.ajax({

    url:'{{route('category.get')}}',
    headers: {'X-CSRF-TOKEN': token},
    data: data,
    type: 'POST',
    datatype: 'JSON',
    success: function (resp) {

      if(resp=="false")
      {

        $("#categoryerror").show();

      }else{

        $("#categoryerror").hide();

       $.each(resp.category,function(key, value){

        $("#maincategory").append('<option value='+value.categoryid+' class="optcategory">'+ value.category+'</option>');

       });

       }

    }

});

$.ajax({

    url:'{{route('method.get')}}',
    headers: {'X-CSRF-TOKEN': token},
    data: data,
    type: 'POST',
    datatype: 'JSON',
    success: function (resp) {

        if(resp=="false")
        {

          $("#methoderror").show();

        }else{

          $("#methoderror").hide();

       $.each(resp.result,function(key, value){

        $("#method").append('<option value='+value.methodid+' class="optmethod">'+ value.method+'</option>');

       });

       }

    }

});



});



$("#maincategory").change(function(){

$(".optsubcategory").remove();

var catid = $("#maincategory option:selected").val();

var data = {catid: catid};

$.ajax({

    url:'{{route('subcategory.get')}}',
    headers: {'X-CSRF-TOKEN': token},
    data: data,
    type: 'POST',
    datatype: 'JSON',
    success: function (resp) {



      if(resp=="false")
      {

        $("#subcaterror").show();

      }else{
      
      $("#subcaterror").hide();

       $.each(resp.subcat,function(key, value){

       $("#subcategory").append('<option value='+value.subcategoryid+' class="optsubcategory">'+ value.subcategory+'</option>');

       });

       }






    }

});


});




$(".officeselectorbtn").click(function(){



var branchcode = $(this).attr("id");
var branch = $(this).attr("name");
var address = $(this).attr("address");
var area = $(this).attr("area");

$("#officename").val(branch);

$("#officecode").val(branchcode);

$("#officeaddress").val(address);

$("#officecity").val(area);

$("#officeselector").modal('hide');


});



$(".locationselectorbtn").click(function(){


var locationid = $(this).attr("id");
var location = $(this).attr("name");
var address = $(this).attr("address");
var area = $(this).attr("area");

$("#locationid").val(locationid);

$("#locationname").val(location);

$("#locationaddress").val(address);

$("#locationarea").val(area);

$("#locationselector").modal('hide');



});





$(".trainermodalbtn").click(function(){

var trainerid = $(this).attr("id");

$("#tid").val(trainerid);

$("#trainermodal").modal('show');

});


$(".trainerselectorbtn").click(function(){

var tid = $("#tid").val();

var trainername = $(this).attr("id");

switch(tid)
{

case "1":

$("#trainerone").val(trainername);

break;

case "2":

$("#trainertwo").val(trainername);

break;

case "3":

$("#trainerthree").val(trainername);

break;

case "4":

$("#trainerfour").val(trainername);

break;

}



$("#trainermodal").modal('hide');




});

















});


</script>

<!--<script src="{!! asset('theme/assets/global/plugins/morris/morris.min.js')!!}" type="text/javascript"></script>-->






@endpush

