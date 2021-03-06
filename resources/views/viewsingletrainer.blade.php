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
                <h1 style="text-transform: none;">View Trainer</h1>
                <ol class="breadcrumb">
                    <li>
                        Home
                    </li>
                    <li>
                        Training
                    </li>
                    <li class="active">View Trainer</li>
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
                                            <i class=" icon-user font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Trainer Details</span>
                                        </div>
                                        <div class="actions">
                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                        
                                                        <label class="btn btn-info btn-outline btn-circle btn-sm" id="printclick">
                                                            
                                                            <input type="radio" name="options" class="toggle" id="option2"><i class="fa fa-print"></i>&nbsp;Print
                                                        
                                                        </label>
                                                        
                                                        <!-- <label class="btn btn-info btn-outline btn-circle btn-sm" id="editbtn">
                                                            
                                                            <input type="radio" name="options" class="toggle" id="option2"><i class="fa fa-edit"></i>&nbsp;Edit
                                                        
                                                        </label>
                                                        
                                                         <label class="btn btn-danger  btn-outline btn-circle btn-sm" id="deletenow">
                                                            
                                                            <input type="radio" name="options" class="toggle" id="option1"><i class="fa fa-trash-o"></i>&nbsp;Delete
                                                        
                                                        </label> -->
                                                        
                                                        
                                                    </div>
                                                </div>


                                    </div>
                                    
                                    <div class="portlet-body">
                                   <div class="row">
                                          <div class="col-md-2"></div>
                                          <div class="col-md-8" id="printTable" style="border:1px solid #eef1f5;">


                                          <table class="table">
                                              @forelse($trainer as $record)
                                              <tr>
                                              <th colspan="2" class="font-green">Personal Information</th>
                                              </tr>
                                              <tr>
                                                  <th class="col-md-3">Name</th>
                                                  <td class="col-md-9">{{$record->trainername}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Surname</th>
                                                  <td class="col-md-9">{{$record->surname}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">CNIC Number</th>
                                                  <td class="col-md-9">{{$record->cnic}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Name</th>
                                                  <td class="col-md-9">{{$record->trainername}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Date Of Birth</th>
                                                  <td class="col-md-9">{{$record->dateofbirth}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Gender</th>
                                                  <td class="col-md-9">{{$record->gender}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Address</th>
                                                  <td class="col-md-9">{{$record->address}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Mobile Number</th>
                                                  <td class="col-md-9">{{$record->mobile}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Email Address</th>
                                                  <td class="col-md-9">{{$record->email}}</td>
                                              </tr>

                                              <tr>
                                              <th colspan="2" class="font-green">Qualification, Skills & Profession</th>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Trainer Qualification</th>
                                                  <td class="col-md-9">{{$record->qualification}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Trainer Profession / Job</th>
                                                  <td><?php $profession = explode("-", $record->profession); ?>{{$profession[1]}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Trainer Type</th>
                                                  <td>
                                                    
                                                    @if($record->trainertype == 1)
       
                                                    {{"In Service"}}

                                                    @elseif($record->trainertype == 2)

                                                    {{"Pre Service"}}

                                                    @elseif($record->trainertype == 3)

                                                    {{"Volunteer"}}

                                                    @endif        



                                                  </td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Trainer Level</th>
                                                  <td>
                                                    
                                                    @if($record->trainerlevel == 1)
       
                                                   {{"Training Expert"}}

                                                   @elseif($record->trainerlevel == 2)

                                                   {{"Qualified Trainer"}}

                                                   @elseif($record->trainerlevel == 3)

                                                   {{"Master Trainer"}}

                                                   @endif 

                                                  </td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Primary Language</th>
                                                  <td class="col-md-9">{{$record->primarylanguage}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Secondary Language</th>
                                                  <td class="col-md-9">{{$record->secondarylanguage}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Additional Information</th>
                                                  <td class="col-md-9">{{$record->info}}</td>
                                              </tr>

                                              <tr>
                                              <th colspan="2" class="font-green">Project & Reporting Office</th>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Project Name</th>
                                                  <td><?php $project = explode("-", $record->project); ?>{{$project[1]}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Reporting Office</th>
                                                  <td class="col-md-9">{{$record->reportingoffice}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Branch / Office Code</th>
                                                  <td class="col-md-9">{{$record->officecode}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Office Address</th>
                                                  <td class="col-md-9">{{$record->officeaddress}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Record Id</th>
                                                  <td class="col-md-9">{{$record->id}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Entered By</th>
                                                  <td><?php $addedby = explode("-", $record->addedby); ?>{{$addedby[1]}}</td>
                                              </tr>

                                              <tr>
                                                  <th class="col-md-3">Entry Date</th>
                                                  <td class="col-md-9">{{$record->created_at}}</td>
                                              </tr>

                                              








                                              @empty

                                              <tr>
                                                  <th colspan="2"><div class="alert alert-info">Record Not Found...!</div></th>
                                              </tr>
                                              @endforelse
                                          </table>














                                          </div>
                                          <div class="col-md-2"></div>
                                    </div>   <br>
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
 
    function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$(document).ready(function(){


$("#printclick").click(function(){
    
   printData(); 
    
});
    
$("#deletenow").click(function(){
   
var cnf = confirm("Are You Sured you want to delete this project...!");

var pid = $("#pid").val();
    
if(cnf == true)
{
  
    window.location.href="{{url('/project/delete/')}}/"+pid;
    
}
    
}); 
    
    
$("#editbtn").click(function(){
    
    var pid = $("#pid").val();
    window.location.href="{{url('/project/edit/')}}/"+pid;
    
});    
 


});


</script>

<!--<script src="{!! asset('theme/assets/global/plugins/morris/morris.min.js')!!}" type="text/javascript"></script>-->






@endpush

