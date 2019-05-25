<!DOCTYPE html>
<!-- <html lang="en">-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" href="{{ url('/') }}/ace_assets/images/ticket-icon-ci.png" />

    <!-- bootstrap & fontawesome -->
    <!-- Html::style('ace_assets/css/bootstrap.css') -->

    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/font-awesome.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/jquery-ui.custom.css" />
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/chosen.css" />
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/datepicker.css" />
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/daterangepicker.css" />
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/bootstrap-datetimepicker.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/ace-fonts.css" />

    <!-- dashboard styles -->
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/dashboard.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!-- custom styles -->
    <link rel="stylesheet" href="{{ url('/') }}/css/custom_style.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
        <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/ace-part2.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="{{ url('/') }}/ace_assets/css/ace-ie.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ url('/') }}/ace_assets/js/ace-extra.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ url('/') }}/ace_assets/js/html5shiv.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/respond.js"></script>
    <![endif]-->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script type="text/javascript">
        var ace_assets_baselink = "{{ url('/') }}/ace_assets/";
        window.jQuery || document.write("<script src='"+ace_assets_baselink+"js/jquery.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='"+ace_assets_baselink+"js/jquery.mobile.custom.js'>"+"<"+"/script>");
    </script>
    <script src="{{ url('/') }}/ace_assets/js/bootstrap.js"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
      <script src="{{ url('/') }}/ace_assets/js/excanvas.js"></script>
    <![endif]-->
    <script src="{{ url('/') }}/ace_assets/js/jquery-ui.custom.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/jquery.ui.touch-punch.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/chosen.jquery.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/fuelux/fuelux.spinner.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/date-time/bootstrap-datepicker.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/date-time/bootstrap-timepicker.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/date-time/moment.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/date-time/daterangepicker.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/date-time/bootstrap-datetimepicker.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/jquery.easypiechart.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/jquery.sparkline.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/flot/jquery.flot.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/flot/jquery.flot.pie.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/flot/jquery.flot.resize.js"></script>

    <!-- ace scripts -->
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.scroller.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.colorpicker.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.fileinput.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.typeahead.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.wysiwyg.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.spinner.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.treeview.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.wizard.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/elements.aside.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.ajax-content.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.touch-drag.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.sidebar.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.sidebar-scroll-1.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.submenu-hover.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.widget-box.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.settings.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.settings-rtl.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.settings-skin.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.widget-on-reload.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/ace/ace.searchbox-autocomplete.js"></script>

    <!-- page specific plugin scripts -->
    <!--[if lte IE 8]>
      <script src="assets/js/excanvas.js"></script>
    <![endif]-->
    <script src="{{ url('/') }}/ace_assets/js/bootstrap-colorpicker.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/jquery.knob.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/jquery.autosize.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/jquery.inputlimiter.1.3.1.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/jquery.maskedinput.js"></script>
    <script src="{{ url('/') }}/ace_assets/js/bootstrap-tag.js"></script>

    <script src="{{ url('/') }}/ace_assets/js/form_elements.js"></script>

    <!--clock2 start-->
    <script language="JavaScript" type="text/javascript">
        function sivamtime() {
          now=new Date();
          hour=now.getHours();
          min=now.getMinutes();
          sec=now.getSeconds();

        if (min<=9) { min="0"+min; }
        if (sec<=9) { sec="0"+sec; }
        if (hour>12) { hour=hour-12; add="pm"; }
        else { hour=hour; add="am"; }
        if (hour==12) { add="pm"; }

        time = ((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add;

        if (document.getElementById) { document.getElementById('theTime').innerHTML = time; }
        else if (document.layers) {
         document.layers.theTime.document.write(time);
         document.layers.theTime.document.close(); }

        setTimeout("sivamtime()", 1000);
        }
        window.onload = sivamtime;
    </script>
    <!--clock2 close-->
    <style>
    .table > tbody > tr > td {
        vertical-align: middle;
    }
    .table > tbody > tr > td > a, .table > tbody > tr > td > form {
        display: inline-block !important;
    }
    small.summary_{
        font-size: 100%;
        padding-top: 7px;
        color: #fff;
        font-weight: bold;
    }
    </style>
    <script>
        $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</head>
<body class="no-skin">

    <!-- _________________________HEADER DIVITION STARTS_____________________________ -->
    <!-- #section:basics/navbar.layout -->
    <div id="navbar" class="navbar navbar-default">
        <script type="text/javascript">
            try{ace.settings.check('navbar' , 'fixed')}catch(e){}
        </script>

        <div class="navbar-container" id="navbar-container">
            <!-- #section:basics/sidebar.mobile.toggle -->
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <!-- /section:basics/sidebar.mobile.toggle -->
            <div class="navbar-header pull-left">
                <!-- #section:basics/navbar.layout.brand -->
                <a href="#" class="navbar-brand">
                    <small class="summary_">
                        <!-- <i class="fa fa-leaf"></i> -->
                        <i class="ace-icon fa fa-barcode"></i>
                        {{ config('app.name') }}
                    </small>
                </a>
                <small class="summary_"> (Laravel)</small>

                <!-- /section:basics/navbar.layout.brand -->

                <!-- #section:basics/navbar.toggle -->

                <!-- /section:basics/navbar.toggle -->
            </div>

            <!-- #section:basics/navbar.dropdown -->
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="grey">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size: 16px; font-weight: bold;">
                            <!--for clock2-->
                            <span id="theTime" ></span> <?php echo "<span style='color:cyan;'>".date('d-M-Y')."</span>";?>
                            <!--for clock2-->
                        </a>
                    </li>
                    
                    <!-- <li class="grey">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-tasks"></i>
                            <span class="badge badge-grey">4</span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-check"></i>
                                4 Tasks to complete
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Software Update</span>
                                                <span class="pull-right">65%</span>
                                            </div>

                                            <div class="progress progress-mini">
                                                <div style="width:65%" class="progress-bar"></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Hardware Upgrade</span>
                                                <span class="pull-right">35%</span>
                                            </div>

                                            <div class="progress progress-mini">
                                                <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Unit Testing</span>
                                                <span class="pull-right">15%</span>
                                            </div>

                                            <div class="progress progress-mini">
                                                <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Bug Fixes</span>
                                                <span class="pull-right">90%</span>
                                            </div>

                                            <div class="progress progress-mini progress-striped active">
                                                <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">
                                    See tasks with details
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="purple">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                            <span class="badge badge-important">8</span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-exclamation-triangle"></i>
                                8 Notifications
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                                    New Comments
                                                </span>
                                                <span class="pull-right badge badge-info">+12</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="btn btn-xs btn-primary fa fa-user"></i>
                                            Bob just signed up as an editor ...
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                                                    New Orders
                                                </span>
                                                <span class="pull-right badge badge-success">+8</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                                                    Followers
                                                </span>
                                                <span class="pull-right badge badge-info">+11</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">
                                    See all notifications
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="green">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                            <span class="badge badge-success">5</span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-envelope-o"></i>
                                5 Messages
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Alex:</span>
                                                    Ciao sociis natoque penatibus et auctor ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>a moment ago</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Susan:</span>
                                                    Vestibulum id ligula porta felis euismod ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>20 minutes ago</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Bob:</span>
                                                    Nullam quis risus eget urna mollis ornare ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>3:15 pm</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Kate:</span>
                                                    Ciao sociis natoque eget urna mollis ornare ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>1:33 pm</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Fred:</span>
                                                    Vestibulum id penatibus et auctor  ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>10:09 am</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="inbox.html">
                                    See all messages
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->

                    <!-- #section:basics/navbar.user_menu -->
                    <?php
                    if (Auth::guard('admin')->check()) {
                        $userType = 'admin';
                    }else{
                        $userType = 'user';
                    }
                    ?>
                    @if(Auth::guest())

                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <!-- <img class="nav-user-photo" 
                                src="" alt="photo" /> -->
                                <span class="user-info">
                                    <small>Welcome</small>
                                </span>
                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="{{route('login')}}">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">
                                        <i class="ace-icon fa fa-user"></i>
                                        Sign up
                                    </a>
                                </li>                                                              
                            </ul>
                        </li>
                    @else
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <!-- <img class="nav-user-photo" 
                                src="{{ url('/') }}/ace_assets/images/profile/jaga.jpg" alt="photo" /> -->
                                <span class="user-info">
                                    <small>Welcome, ({{$userType}})</small>
                                    {{Auth::user()->name}}
                                </span>
                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('/admin/change/'.Auth::user()->id)}}">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li class="divider"></li>
                                
                                @if(Auth::guard('admin')->check())
                                
                                <li>
                                    <a href="{{route('admin.auth.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST"                         style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                                @elseif(Auth::guard('web')->check())

                                <li>
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @endif

                            </ul>
                        </li>
                        @endif

                    <!-- /section:basics/navbar.user_menu -->
                </ul>
            </div>

            <!-- /section:basics/navbar.dropdown -->
        </div><!-- /.navbar-container -->
    </div>

<!-- /section:basics/navbar.layout -->
    <div class="main-container" id="main-container">
        <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>
    <!-- _________________________ HEADER DIVITION ENDS ___________________________ -->
    <!-- _________________________ NAVIGATION STARTS ___________________________ -->
    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>

        <!-- div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>
        
                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>
        
                #section:basics/sidebar.layout.shortcuts
                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>
        
                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
        
                /section:basics/sidebar.layout.shortcuts
            </div>
        
            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>
        
                <span class="btn btn-info"></span>
        
                <span class="btn btn-warning"></span>
        
                <span class="btn btn-danger"></span>
            </div>
        </div>/.sidebar-shortcuts -->

        <ul class="nav nav-list">
                    
            <!-- #section:basics/sidebar.layout.minimize -->
            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>

        @if( ! Auth::guest())

            <li class="{{ (Request::is('admin/dashboard') || Request::is('admin')) ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class=" (Request::is('admin/change') ) ? 'active' : '' ">
                <a href="{{url('/admin/change/'.Auth::user()->id)}}">
                    <i class="menu-icon fa fa-folder"></i>
                    <span class="menu-text"> Profile </span>
                </a>
                <b class="arrow"></b>
            </li>

            
        @endif
            
        </ul><!-- /.nav-list -->

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>
    <!-- _________________________ NAVIGATION ENDS ___________________________ -->
    <!-- _________________________ MAIN CONTENTS STARTS ___________________________ -->
    <div class="main-content">        

    <!-- /section:basics/sidebar -->
        <div class="main-content">
            <div class="main-content-inner">

                <!-- /section:basics/content.breadcrumbs -->
                <div class="page-content">

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- #section:basics/content.breadcrumbs -->
                            <div class="breadcrumbs" id="breadcrumbs">
                                <script type="text/javascript">
                                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                                </script>

                                @yield('content_title')

                                <!-- /section:basics/content.searchbox -->
                            </div>
                        <!--_____Main import Contents______ -->
                        <div class="content_body">
                            @yield('content')
                        </div>

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->

                <div class="footer">
                    <div class="footer-inner">
                      <!-- #section:basics/footer -->
                      <div class="footer-content">
                        <span class="bigger-120">
                          <span class="blue bolder">{{ config('app.name') }}</span>
                          &copy; Jagabandhu Roy, 2012-2018.
                        </span>

                        &nbsp; &nbsp;
                        <span class="action-buttons">
                          <a href="#">
                            <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                          </a>

                          <a href="#">
                            <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                          </a>

                          <a href="#">
                            <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                          </a>
                        </span>
                      </div>

                      <!-- /section:basics/footer -->
                    </div>
                  </div>

                  <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                  </a>
              
            </div>
        </div><!-- /.main-content -->

    </div><!-- /.main-container -->
    
    <!-- for ajax loader starts-->
    <div class="load-container" id="ajax_loader">
        Processing...
        <img src="{{ url('/') }}/ace_assets/images/loadingAnimation.gif">
    </div>
    <style>
    .load-container
    {
        height: 100vh;
        width: 100vw;
        padding: 0;
        margin: 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0,.8);
        z-index: 99999999;
        display: none;
    }
    .load-container>img
    {
        position: absolute;
        height: 30px;
        width: 200px;
        border-radius: 7px;
        top: 50%;
        left: 50%;
        margin-left: -50px;
        margin-top: -50px;
    }
    </style>
    <script>
        $(document).ajaxStart(function()
        {
            $("#ajax_loader").show();
        });
        $(document).ajaxComplete(function()
        {
            $("#ajax_loader").hide();
        });

    </script>
    <!-- for ajax loader ends-->

</body>
</html>
    
