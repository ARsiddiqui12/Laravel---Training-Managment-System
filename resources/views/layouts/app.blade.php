<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <meta content="SMART - Training Management System" name="description" />

    <meta content="Abdul Rehman Siddiqui" name="author" />



    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{!! asset('theme/assets/global/plugins/select2/css/select2.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('theme/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!! asset('theme/assets/global/css/components.min.css') !!}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{!! asset('theme/assets/global/css/plugins.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{!! asset('theme/assets/pages/css/login.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->



    <link rel="shortcut icon" href="favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMART - Training Management System</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="login">


@yield('content')



    <!--[if lt IE 9]>
    <script src="{!! asset('theme/assets/global/plugins/respond.min.js') !!}"></script>
    <script src="{!! asset('theme/assets/global/plugins/excanvas.min.js') !!}"></script>
    <script src="{!! asset('theme/assets/global/plugins/ie8.fix.min.js') !!}"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{!! asset('theme/assets/global/plugins/jquery.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/js.cookie.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/jquery.blockui.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{!! asset('theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/jquery-validation/js/additional-methods.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('theme/assets/global/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{!! asset('theme/assets/global/scripts/app.min.js') !!}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{!! asset('theme/assets/pages/scripts/login.min.js') !!}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
    <!-- Google Code for Universal Analytics -->

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
