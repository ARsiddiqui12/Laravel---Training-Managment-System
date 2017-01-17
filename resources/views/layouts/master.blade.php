    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>

    <meta charset="utf-8" />

    <title>{{ isset($title) ? $title : 'SMART | Training Management System' }}</title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <meta content="SMART Training Management System for Organizations" name="description" />

    <meta content="" name="author" />

    <!-- BEGIN LAYOUT FIRST STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <!-- END LAYOUT FIRST STYLES -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
<!--    <link href="{!! asset('theme/assets/global/plugins/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />-->
        <link href="{!! asset('theme/assets/fonts/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />
        
    <link href="{!! asset('theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/global/plugins/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->


    <!-- BEGIN PAGE LEVEL PLUGINS -->


        @stack('css')


    <!-- END PAGE LEVEL PLUGINS -->


    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!! asset('theme/assets/global/css/components.min.css')!!}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{!! asset('theme/assets/global/css/plugins.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{!! asset('theme/assets/layouts/layout5/css/layout.min.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/layouts/layout5/css/custom.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />

    </head>

    <!-- END HEAD -->
    <ody class="page-header-fixed page-sidebar-closed-hide-logo">

    <!-- BEGIN CONTAINER -->
    <div class="wrapper">
        <!-- BEGIN HEADER -->
        <header class="page-header">
            <nav class="navbar mega-menu" role="navigation">
                <div class="container-fluid">
                    <div class="clearfix navbar-fixed-top">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                        </button>
                        <!-- End Toggle Button -->
                        <!-- BEGIN LOGO -->
                        <span id="index" class="page-logo">
                            <span style="font-weight:bold;font-size:30px;color:#009dc7;">SMART<span style="color:white;">App</span></span>
                        </span>
                        <!-- END LOGO -->
                        <!-- BEGIN SEARCH -->
                        
                        <!-- END SEARCH -->
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">
                            <!-- BEGIN GROUP NOTIFICATION -->
                            <div class="btn-group-notification btn-group" id="header_notification_bar">
                                <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge">7</span>
                                </button>
                                <ul class="dropdown-menu-v2">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 pending</span> notifications</h3>
                                        <a href="#">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success md-skip">
                                                                <i class="fa fa-plus"></i>
                                                            </span> New user registered. </span>
                                                    <span class="time">just now</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Server #12 overloaded. </span>
                                                    <span class="time">3 mins</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning md-skip">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span> Server #2 not responding. </span>
                                                    <span class="time">10 mins</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info md-skip">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> Application error. </span>
                                                    <span class="time">14 hrs</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Database overloaded 68%. </span>
                                                    <span class="time">2 days</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> A user IP blocked. </span>
                                                    <span class="time">3 days</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning md-skip">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span> Storage Server #4 not responding dfdfdfd. </span>
                                                    <span class="time">4 days</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info md-skip">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> System Error. </span>
                                                    <span class="time">5 days</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Storage server failed. </span>
                                                    <span class="time">9 days</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- END GROUP NOTIFICATION -->
                            <!-- BEGIN GROUP INFORMATION -->
                            <div class="btn-group-red btn-group">
                                <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu-v2" role="menu">
                                    <li class="active">
                                        <a href="#">New Post</a>
                                    </li>
                                    <li>
                                        <a href="#">New Comment</a>
                                    </li>
                                    <li>
                                        <a href="#">Share</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Comments
                                            <span class="badge badge-success">4</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Feedbacks
                                            <span class="badge badge-danger">2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END GROUP INFORMATION -->
                            <!-- BEGIN USER PROFILE -->
                            <div class="btn-group-img btn-group">
                                <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span>Hi, {{ Auth::user()->username }}</span>
                                    <img src="{!! asset('theme/assets/layouts/layout5/img/avatar1.jpg')!!}" alt=""> </button>
                                <ul class="dropdown-menu-v2" role="menu">
                                    <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile
                                            <span class="badge badge-danger">1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="app_inbox.html">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo_2.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="page_user_lock_1.html">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li>
                                    <li>
                                       
<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                             <i class="icon-key"></i> Log Out </a>
                       
                    

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">                      
                        
                        {{ csrf_field() }}
                    
                                        
            </form>
                                        
                                        
                                        
                                    </li>
                                </ul>
                            </div>
                            <!-- END USER PROFILE -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <button type="button" class="quick-sidebar-toggler md-skip" data-toggle="collapse">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </button>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </div>
                        <!-- END TOPBAR ACTIONS -->
                    </div>
                    <!-- BEGIN HEADER MENU -->
                    <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown dropdown-fw dropdown-fw-disabled 
                                       
                                        @if(Request::segment(1)=='home')
                                        
                                        active selected open                                 
                                                                         
                                       @endif
                                       
                                       ">
                                <a href="{{url('home')}}" class="text-uppercase">
                                    <i class="icon-home"></i> SMART </a>
                                <ul class="dropdown-menu dropdown-menu-fw">
                                    
                                    <li>
                                        <a href="{{url('project/view')}}">
                                            <i class="icon-graph"></i><strong>Project</strong>  </a>
                                    </li>
                                    
                                    <li>
                                        <a href="#">
                                            <i class="icon-bar-chart"></i> <strong>Training</strong> </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bulb"></i><strong>Trainer</strong> </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-graph"></i><strong>Participant</strong>  </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-graph"></i><strong>Settings</strong>  </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-graph"></i><strong>Search</strong>  </a>
                                    </li>
                                     
                                </ul>
                            </li>
                            <li class="dropdown dropdown-fw dropdown-fw-disabled  
                                       
                                        @if(Request::segment(1)=='training')
                                        
                                        active selected open                                 
                                                                         
                                       @endif
                                       
                                       ">
                                <a href="#" class="text-uppercase">
                                    <i class="icon-puzzle"></i> Training </a>
                                <ul class="dropdown-menu dropdown-menu-fw">
                                    <li class="dropdown ">
                                        <a href="#">
                                            <i class="icon-diamond"></i> <strong>Add Method</strong> </a>
                                        
                                    </li>
                                    <li class="dropdown more-dropdown-sub">
                                        <a href="#">
                                            <i class="icon-puzzle"></i> <strong>Category</strong> </a>
                                        <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#">Add Category</a>
                                                </li>
                                                <li>
                                                    <a href="#"> 
                                                    Add Sub-Category
                                                    </a>
                                                </li>
                                            
                                        </ul>
                                        
                                    </li>
                                    
                                    <li class="dropdown ">
                                        <a href="index8a36-2.html?p=">
                                            <i class="icon-wallet"></i> <strong>Add Targeted Place</strong> </a>
                                        
                                    </li>
                                    
                                    <li class="dropdown">
                                        <a href="index8a36-2.html?p=">
                                            <i class="icon-wallet"></i> <strong>Add Training Location</strong> </a>
                                        
                                    </li>
                                    
                                    
                                    <li class="dropdown ">
                                        <a href="#">
                                            <i class="icon-settings"></i> <strong>Add Trainer</strong> </a>
                                    
                                    </li>
                                    
                                    
                                </ul>
                            </li>
                            <li class="dropdown dropdown-fw dropdown-fw-disabled  ">
                                <a href="#" class="text-uppercase">
                                    <i class="icon-briefcase"></i> Participant </a>
                                <ul class="dropdown-menu dropdown-menu-fw">
                                    <li class="dropdown ">
                                        <a href="#">
                                            <i class="icon-settings"></i> <strong>Add Profession</strong> </a>
                                    
                                    </li>
                                   
                                    <li class="dropdown ">
                                        <a href="#">
                                            <i class="icon-settings"></i> <strong>Add Targeted Place</strong> </a>
                                    
                                    </li>
                                    
                                    <li class="dropdown ">
                                        <a href="#">
                                            <i class="icon-settings"></i> <strong>Add Training Location</strong> </a>
                                    
                                    </li>
                                    <li class="dropdown ">
                                        <a href="#">
                                            <i class="icon-settings"></i> <strong>Search</strong> </a>
                                    
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="dropdown dropdown-fw dropdown-fw-disabled 
                                       
                                       @if(Request::segment(1)=='project')
                                        
                                        active selected open                                 
                                                                         
                                       @endif
                                       
                                       ">
                                <a href="{{url('project/view')}}" class="text-uppercase">
                                    <i class="icon-layers"></i> Project </a>
                                <ul class="dropdown-menu dropdown-menu-fw">
                                    <li class="dropdown">
                                        <a href="{{url('project/add')}}">
                                            <i class="icon-basket"></i> Add Project 
                                        </a>
                                        
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">
                                            <i class="icon-basket"></i> Add Trainer
                                        </a>
                                        
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">
                                            <i class="icon-basket"></i> Search
                                        </a>
                                        
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">
                                            <i class="icon-basket"></i> Reports & Analysis
                                        </a>
                                        
                                    </li>
                                    
                                    
                                    
                                    
                                </ul>
                            </li>
                            <li class="dropdown more-dropdown">
                                <a href="#" class="text-uppercase"> More</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Search</a>
                                    </li>
                                    <li>
                                        <a href="#">Monthly Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Quartorly Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Annual Report</a>
                                    </li>
                                    <li>
                                        <a href="#">System Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END HEADER MENU -->
                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- END HEADER -->
        
        
        
    @yield('content') 
    


    <!--[if lt IE 9]>
    <script src="{!! asset('theme/assets/global/plugins/respond.min.js')!!}"></script>
    <script src="{!! asset('theme/assets/global/plugins/excanvas.min.js')!!}"></script>
    <script src="{!! asset('theme/assets/global/plugins/ie8.fix.min.js')!!}"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{!! asset('theme/assets/global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/js.cookie.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/jquery.blockui.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')!!}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->


        
        
        
    @stack('js')



    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{!! asset('theme/assets/global/scripts/app.min.js')!!}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{!! asset('theme/assets/pages/scripts/dashboard.min.js')!!}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{!! asset('theme/assets/layouts/layout5/scripts/layout.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/layouts/global/scripts/quick-sidebar.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/layouts/global/scripts/quick-nav.min.js')!!}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

    

<!-- End -->



</body>
</html>









































































