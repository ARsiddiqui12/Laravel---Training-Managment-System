@extends('layouts.master')

@push('css')

<link href="{!! asset('theme/assets/global/plugins/select2/css/select2.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('theme/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') !!}" rel="stylesheet" type="text/css" />


@endpush



@section('content')

@forelse($pdetails as $record)





    <div class="container-fluid">
        <div class="page-content">
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
                <h1 style="text-transform: none;">Edit Project</h1>
                <ol class="breadcrumb">
                    <li>
                        Home
                    </li>
                    <li>
                        Project
                    </li>
                    <li class="active">Edit Project</li>
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
                    <!-- BEGIN PAGE SIDEBAR -->
                    <div class="page-sidebar">
                        <nav class="navbar" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <ul class="nav navbar-nav margin-bottom-35">
                                <li class="active">
                                    <a href="{{url('/home')}}">
                                        <i class="icon-home"></i> Dashboard </a>
                                </li>
                                <li>
                                    <a href="{{url('/project/view')}}">
                                        <i class="icon-bar-chart "></i> View Projects </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-folder"></i> Project Categories </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-user "></i> Add Trainer </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-map-marker"></i> Add Targeted Place </a>
                                </li>
                            </ul>
<!--
                            <h3>Quick Actions</h3>
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#">
                                        <i class="icon-envelope "></i> Inbox
                                        <label class="label label-danger">New</label>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-paper-clip "></i> Task </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-star"></i> Projects </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-pin"></i> Events
                                        <span class="badge badge-success">2</span>
                                    </a>
                                </li>
                            </ul>
-->
                        </nav>
                    </div>
                    <!-- END PAGE SIDEBAR -->
                    <div class="page-content-col">
                        <!-- BEGIN PAGE BASE CONTENT -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Edit Project</span>
                                        </div>

                                    </div>
                                    <div class="portlet-body">


                                        @if(Session('successmsg'))

                                            <div class="form-body">
                                            <div class="alert alert-success" role="alert" style="font-style: italic;">Success: {{ Session('successmsg') }}</div>
                                            </div>

                                        @endif


@if ($errors->has('project_category'))
<span class="help-block">
<div class="alert alert-warning" role="alert">
Error: {{ $errors->first('project_category') }}
</div>
</span>
@endif

@if ($errors->has('project_title'))
<span class="help-block">
<div class="alert alert-warning" role="alert">
Error: {{ $errors->first('project_title') }}
</div>
</span>
@endif
                                        
@if ($errors->has('editor1'))
<span class="help-block">
<div class="alert alert-warning" role="alert">
Error: {{ $errors->first('editor1') }}
</div>
</span>
@endif
                                        
@if ($errors->has('image'))
<span class="help-block">
<div class="alert alert-warning" role="alert">
Error: {{ $errors->first('image') }}
</div>
</span>
@endif



                                        <!-- BEGIN FORM-->
                                        <form action="{{ route('project.edit') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            {{ csrf_field() }}
                                            
                                            <div class="form-body">

                                                
                                                
                                                <div class="form-group">
                                                    
         <input type="hidden" name="projectid" value="{{$record->projectid}}" />

            <?php $exp = explode("-",$record->projectcate); ?>                                        
                         <div class="col-md-8">
                        <label><strong>Project Category</strong></label>
                                                <strong><a href="#" class="pull-right" data-toggle="modal" data-target="#mymodal" data-backdrop="static" data-keyboard="false">Add Category</a></strong>
                                                    
                                                <select class="form-control" name="project_category" required>
                                                
                                                    <option value="" selected>Select Project Category</option>

                                                    @forelse($categories as $row)

        <option value="{{$row->catid.'-'.$row->cattitle}}"   
                
                @if($row->catid==$exp[0])
                    
                selected="selected"
                
                @endif
            
            >{{$row->cattitle}}</option>

                                                    @empty

                                                    <option value="">Category Not Found..!</option>


                                                    @endforelse

                                                
                                                </select>
                                                </div>
                                                    
                                                  
                                                
                                                
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                <div class="col-md-12">
                                                <label><strong>Project Title</strong></label>
                                                
<input type="text" name="project_title" placeholder="Project Title" class="form-control" value="{{ $record->title}}" required>    
                                                    
                                                </div>
                                                
                                                
                                                
                                                </div>
                                                
                                                
                                                
                                                
                                            <div class="form-group">
                                                
                                 <div class="col-md-6">
                                                    
            <label><strong>Project Starting Date</strong></label>    
                                
            <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
            <input type="text" class="form-control" placeholder="Project Starting Date" name="startdate" value="{{$record->startdate}}" required="required">
            <span class="input-group-btn">
            <button class="btn default" type="button">
            <i class="fa fa-calendar"></i>
            </button>
            </span>
            </div>
                                
 
                                 </div>

                                <div class="col-md-6">
                                                    
                                 <label><strong>Project Ending Date</strong></label>    
                                
                                 <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
            <input type="text" class="form-control" placeholder="Project Ending Date" name="enddate" value="{{$record->enddate}}" required>
            <span class="input-group-btn">
            <button class="btn default" type="button">
            <i class="fa fa-calendar"></i>
            </button>
            </span>
            </div>

                                
 
                                 </div>
                
                                                
                                                
                                 </div>    
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                 <div class="form-group">
                                                
                                 <div class="col-md-12">
                                                    
                                 <label><strong>Project Description</strong></label>    
                                
                                <textarea class=" form-control" rows="12" name="editor1"  required="required">{{$record->description}}</textarea>
 
                                 </div>
                                                
                                 </div>
                                                
                                               

                                                
                                                
                                <div class="form-group">
                                                
                                    <div class="col-md-12">
                                    
                                    
                                    <label><strong>Project Logo</strong></label> 
                                    <input type="hidden" name="oldimage" value="{{$record->logo}}">    
                                        <br>
                                    <img src="{!! asset('storage/images/'.$record->logo.'')!!}" class="img-responsive img-thumbnail" alt="{{$record->title}}" style="width:204px;height:auto;" id="oldimg">
                                        <a href="javascript:;" id="uploadbtn">Remove Image</a>
                                        <br><br>
                                        
                                    <input type="file" id="uploader" name="image">
                                    
                                    
                                    </div>           
                                
                                                
                                </div>                



                                                
                                                
                                                
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green">Submit</button>
<!--                                                        <button type="reset" class="btn default">Cancel</button>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
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
    <!-- BEGIN QUICK NAV -->
    <nav class="quick-nav">
        <a class="quick-nav-trigger" href="#0">
            <span aria-hidden="true"></span>
        </a>
        <ul>
            <li>
                <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank" class="active">
                    <span>Purchase Metronic</span>
                    <i class="icon-basket"></i>
                </a>
            </li>
            <li>
                <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/reviews/4021469?ref=keenthemes" target="_blank">
                    <span>Customer Reviews</span>
                    <i class="icon-users"></i>
                </a>
            </li>
            <li>
                <a href="http://keenthemes.com/showcast/" target="_blank">
                    <span>Showcase</span>
                    <i class="icon-user"></i>
                </a>
            </li>
            <li>
                <a href="http://keenthemes.com/metronic-theme/changelog/" target="_blank">
                    <span>Changelog</span>
                    <i class="icon-graph"></i>
                </a>
            </li>
        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>


    <div class="modal fade" id="mymodal" tabindex="-1" backdrop="static" keyboard="false" role="dialog">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Add Project Category</strong></h4>
    </div>

    <div class="modal-body">
        @if ($errors->has('cattitle'))
            <div class="alert alert-danger" role="alert" style="font-style: italic;">Error: {{ $errors->first('cattitle') }}</div>
        @endif
    <form action="{{ route('pcat.add') }}" method="post" >

        <div class="form-group">
            {{ csrf_field() }}
            <label><strong>Title</strong></label>
            <input type="text" name="cattitle" class="form-control" placeholder="Enter Project Category Title" required>

        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-info">Add</button>


        </div>
    </form>
    </div>

    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </div>

    </div>

    </div>





@empty


<!--
<div class="container-fluid">
        <div class="page-content">

<div class="alert alert-danger">
<h1>Record not Found..!</h1>
</div>

     </div>
</div>
-->
<script>
window.location.href="{{url('/project/view')}}";
</script>



@endforelse

 

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

@if($errors->has('cattitle'))

    <script> $("#mymodal").modal({

            backdrop:'static',
            keyboard:false

        }); </script>

@endif

<script>
$(document).ready(function(){
    
   $("#uploader").hide(); 
    
    $("#uploadbtn").click(function(){
        
        $("#uploadbtn").hide();
        
       $("#oldimg").hide();
        
        $("#uploader").attr("required","true");
        
       $("#uploader").show();
          
        
    });
    
    
});

</script>

@endpush
