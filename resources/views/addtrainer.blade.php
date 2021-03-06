@extends('layouts.master')

@push('css')

<link href="{!! asset('theme/assets/global/plugins/select2/css/select2.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') !!}" rel="stylesheet" type="text/css" />

<link href="{!! asset('theme/assets/global/plugins/datatables/datatables.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')!!}" rel="stylesheet" type="text/css" />


@endpush



@section('content')



    <div class="container-fluid">
        <div class="page-content">
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
                <h1 style="text-transform: none;">Trainer Registration Form</h1>
                <ol class="breadcrumb">
                    <li>
                        Home
                    </li>
                    <li>
                        Training
                    </li>
                    <li class="active">Add Trainer</li>
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
                                            <span class="caption-subject font-green sbold uppercase">Add new Trainer</span>
                                        </div>

                                    </div>
                                    
                                    <div class="portlet-body">
                                        @if(Session('successmsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('successmsg') }}</div>
                                            </div>

                                        @endif
                                        
                                        
                                      

                                        <!-- BEGIN FORM-->
                                        <form action="{{route('trainer.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            {{ csrf_field() }}
                                            
                                            <div class="form-body" style="padding: 0px !important;">
                                            
                                            <div class="form-group">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8" style="border:1px solid #eef1f5; padding:10px;">
                                            <div class="col-md-12">
                                                
                                                <h3 style="margin:0px;">Personal Information</h3>
                                                <hr>

                                            </div>


                                             <div class="col-md-6">
                                               <label>Trainer Name <span style="color:red;">*</span></label>   
                                             <input type="text" value="{{old('trainername')}}" class="form-control" placeholder="Trainer Name" name="trainername" required="required">
                                             
                                                @if($errors->has('trainername'))
                                                <span style="color:red;">{{$errors->first('trainername')}}</span>
                                                @endif   
                                                
                                             </div>
                                             
                                             <div class="col-md-6">
                                                 <label>Surname <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('surname')}}" class="form-control" placeholder="Surname" name="surname" required="required">
                                             
                                                @if($errors->has('surname'))
                                                <span style="color:red;">{{$errors->first('surname')}}</span>
                                                @endif    

                                             </div>   



                                             <div class="col-md-6">
                                                 <br><label>CNIC Number <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('cnic')}}" class="form-control" placeholder="CNIC Number" name="cnic" id="cnic" required="required">
                                             
                                                @if($errors->has('cnic'))
                                                <span style="color:red;">{{$errors->first('cnic')}}</span>
                                                @endif    

                                             </div> 
                                             <div class="form-group">
                                             <div class="col-md-6">
                                             
                                                <br> <label>Date Of Birth <span style="color:red;">*</span></label>
                                            
                                              <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
            <input type="text" class="form-control" placeholder="Date Of Birth" value="{{old('dateofbirth')}}" name="dateofbirth" required="required">
            <span class="input-group-btn">
            <button class="btn default" type="button">
            <i class="fa fa-calendar"></i>
            </button>
            </span>
            </div>
                                                @if($errors->has('dateofbirth'))
                                                <span style="color:red;">{{$errors->first('dateofbirth')}}</span>
                                                @endif    
                                                </div>
                                             </div> 


                                             <div class="col-md-6">

                                                <label>Gender <span style="color:red;">*</span></label>
                                                
                                                <select class="form-control" name="gender" required>
                                                    
                                                    <option value="" selected>Select Gender</option>

                                                    <option value="1-Male">Male</option>

                                                    <option value="2-Female">Female</option>

                                                </select>

                                                @if($errors->has('gender'))
                                                <span style="color:red;">{{$errors->first('gender')}}</span>
                                                @endif    

                                             </div> 

                                             <div class="col-md-6">
                                                <label>Home / Office Address  <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('address')}}" class="form-control" placeholder="Home / Office Address" name="address" required="required">
                                             
                                                @if($errors->has('address'))
                                                <span style="color:red;">{{$errors->first('address')}}</span>
                                                @endif    

                                             </div>


                                             <div class="col-md-6">
                                                <br> <label>Mobile Number  <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('mobile')}}" class="form-control" placeholder="Mobile Number" name="mobile" id="mask_phone" required="required">
                                             
                                                @if($errors->has('mobile'))
                                                <span style="color:red;">{{$errors->first('mobile')}}</span>
                                                @endif    

                                             </div>


                                             <div class="col-md-6">
                                                <br> <label>Email Address  <span style="color:green;">( Optional )</span></label>
                                              <input type="email" value="{{old('email')}}" class="form-control" placeholder="Email Address" name="email" >
                                             @if($errors->has('email'))
                                                <span style="color:red;">{{$errors->first('email')}}</span>
                                                @endif
                                             

                                             </div>


                                             <div class="col-md-12"><br>
                                                <h3 style="margin:0px;">Qualification, Skills and Profession</h3>
                                                <hr>
                                             </div>


                                             <div class="col-md-6">
                                                <label>Trainer Qualification  <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('qualification')}}" class="form-control" placeholder="Trainer Qualification" name="qualification" required="required">
                                             
                                                @if($errors->has('qualification'))
                                                <span style="color:red;">{{$errors->first('qualification')}}</span>
                                                @endif    

                                             </div>


                                             <div class="col-md-6">

                                                 <label>Profession / Job <span style="color:red;">*</span></label><a href="javascript:;" class="pull-right" data-toggle="modal" data-target="#profession" data-backdrop="static" data-kyeboard="false">Add Profession</a>
                                                
                                                <select class="form-control" name="profession" required>
                                                    
                                                    <option value="" selected>Select Profession</option>

                                                    @forelse($getprofession as $job)

                                                    <option value="{{$job->id}}-{{$job->profession}}">{{$job->profession}}</option>

                                                    @empty

                                                    <option value="">Record not Found..!</option>

                                                    @endforelse

                                                </select>

                                                @if($errors->has('profession'))
                                                <span style="color:red;">{{$errors->first('profession')}}</span>
                                                @endif    

                                             </div>


                                             <div class="col-md-6">

                                                <br> <label>Trainer Type <span style="color:red;">*</span></label>
                                                
                                                <select class="form-control" name="trainertype" required>
                                                    
                                                    <option value="" selected>Select Trainer Type</option>

                                                    <option value="1">In Service</option>
                                                    <option value="2">Pre Service</option>
                                                    <option value="3">Volunteer</option>

                                                </select>

                                                @if($errors->has('trainertype'))
                                                <span style="color:red;">{{$errors->first('trainertype')}}</span>
                                                @endif    

                                             </div> 


                                             <div class="col-md-6">

                                                <br> <label>Trainer Level <span style="color:red;">*</span></label>
                                                
                                                <select class="form-control" name="trainerlevel" required>
                                                    
                                                    <option value="" selected>Select Trainer Level</option>

                                                    <option value="1">Training Expert</option>
                                                    <option value="2">Qualified Trainer</option>
                                                    <option value="3">Master Trainer</option>

                                                </select>

                                                @if($errors->has('trainerlevel'))
                                                <span style="color:red;">{{$errors->first('trainerlevel')}}</span>
                                                @endif    

                                             </div> 


                                             <div class="col-md-6">
                                               <br> <label>Primary Language  <span style="color:red;">*</span></label>
                                              <input type="text" value="{{old('primarylanguage')}}" class="form-control" placeholder="Primery Language" name="primarylanguage" required="required">
                                             
                                                @if($errors->has('primarylanguage'))
                                                <span style="color:red;">{{$errors->first('primarylanguage')}}</span>
                                                @endif    

                                             </div>

                                             <div class="col-md-6">
                                               <br> <label>Secondary Languages  <span style="color:green;">( Optional )</span></label>
                                              <input type="text" value="{{old('secondarylanguage')}}" class="form-control" placeholder="Secondary Languages ( Sindhi, English, Punjabi )" name="secondarylanguage">
                                             
                                             @if($errors->has('secondarylanguage'))
                                                <span style="color:red;">{{$errors->first('secondarylanguage')}}</span>
                                                @endif 
                                                 

                                             </div>


                                             <div class="col-md-12">
                                               <br> <label>Additional Information  <span style="color:green;">( Optional )</span></label>
                                              <textarea  class="form-control" placeholder="Additional Information" name="info" >
                                              {{old('info')}}
                                             </textarea>
                                                   

                                             </div>


                                             <div class="col-md-12"><br>
                                                <h3 style="margin:0px;">Project and Reporting Place</h3>
                                                <hr>
                                             </div>


                                              <div class="col-md-6">
                                               <label>Project  <span style="color:red;">*</span></label>
                                               <select class="form-control" name="project" required="required">
                                                   <option value="" selected>Select Project</option>

                                                   @forelse($project as $recordtwo)

                                                   <option value="{{$recordtwo->projectid}}-{{$recordtwo->title}}">{{$recordtwo->title}}</option>

                                                   @empty

                                                   <option value="">Record Not Found..!</option>

                                                   @endforelse

                                               </select>  
                                                
                                                @if($errors->has('project'))
                                                <span style="color:red;">{{$errors->first('project')}}</span>
                                                @endif 
                                                 
                                               <br>
                                             </div>

                                             <div class="col-md-6">

                                               <label>Reporting Office  <span style="color:red;">*</span></label>
                                               <a href="javascript:;" class="pull-right" data-toggle="modal" data-target="#office" data-backdrop="static" data-kyeboard="false">Select</a>
                                               <input type="text" name="reportingoffice" placeholder="Select Reporting Office" class="form-control" value="{{old('reportingoffice')}}" id="officename" readonly="readonly" required>
                                               @if($errors->has('reportingoffice'))
                                                <span style="color:red;">{{$errors->first('reportingoffice')}}</span>
                                                @endif
                                             <br>
                                             </div>
                                             <input type="hidden" name="officecode" id="officecode" value="{{old('officecode')}}">
                                             <input type="hidden" name="officeaddress" id="officeaddress" value="{{old('officeaddress')}}">













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




<div class="modal fade" id="profession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Add a new Profession</strong></h4>
      </div>
      <form method="post" action="{{route('profession.add')}}">
      {{ csrf_field() }}
      <div class="modal-body">

      @if(Session('profession'))

      <div class="alert alert-success">Success: {{Session('profession')}}</div>

      @endif
      
        <div class="form-group">
            <label>Profession<span style="color: red;">*</span></label>
            <input type="text" name="profession" placeholder="Profession" required="required" class="form-control">
            <span style="font-size: 12px;color:green; ">Spelling must be Accurate</span>
            @if($errors->has('profession'))
            <span style="color:red;">{{$errors->first('profession')}}</span>
            @endif
        </div>
        <div class="form-group">
            <label>Additional Info <span style="color: green;">( Optional )</span></label>
            <textarea name="info" placeholder="Additional Information About Profession" class="form-control">
            </textarea>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
















<!-- Add profession end -->




<!-- Select Office -->



<div class="modal fade" id="office" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
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
    <button class="btn btn-xs btn-info selecter" id="{{$record->branchcode}}" name="{{$record->branch}}" address="{{$record->address}}, {{$country[1]." / ".$state[1]." / ".$city[1]}}"><i class="fa fa-check"></i> Select 
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


$("#mask_phone").inputmask("9999-9999999");

$("#cnic").inputmask("99999-9999999-9");

$('#sample_1').DataTable({
        
         
        "pageLength": 12,
             
        
    });

$(".selecter").click(function(){

$("#officename").val('');

var branchcode = $(this).attr("id");
var branch = $(this).attr("name");
var address = $(this).attr("address");

$("#officename").val(branch);

$("#officecode").val(branchcode);

$("#officeaddress").val(address);

$("#office").modal('hide');


});



@if(Session('profession') || $errors->has('profession'))

$("#profession").modal({

backdrop:'static',
kyeboard:false

});

@endif



});


</script>

<!--<script src="{!! asset('theme/assets/global/plugins/morris/morris.min.js')!!}" type="text/javascript"></script>-->






@endpush

