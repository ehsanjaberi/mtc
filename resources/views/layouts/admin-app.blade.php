<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css')  }}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">

    <link rel="stylesheet" href="{{ asset('css/persian-datepicker-0.4.5.min.css') }}" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('css/skins/skin-blue.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="height: 100vh!important;">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">پنل</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('img/user1-128x128.jpg') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ \Illuminate\Support\Facades\Auth::user()->Fname .' '. \Illuminate\Support\Facades\Auth::user()->Lname }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('img/user1-128x128.jpg') }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ \Illuminate\Support\Facades\Auth::user()->Fname .' '. \Illuminate\Support\Facades\Auth::user()->Lname }}
{{--                                    <small>مدیر گروه</small>--}}
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer text-center">

                                <div class="">
                                    <a href="#" class="btn btn-primary btn-flat">ویرایش اطلاعات</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="btn btn-danger btn-flat">خروج</a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="{{ asset('img/user1-128x128.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p style="margin-top: 11px">{{ \Illuminate\Support\Facades\Auth::user()->Fname .' '. \Illuminate\Support\Facades\Auth::user()->Lname }}</p>

                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <!-- Optionally, you can add icons to the links -->
                <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='dashboard'?'active':'' }}"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>داشبورد</span></a></li>
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '100')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='users'?'active':'' }}"><a href="{{ route('users') }}"><i class="fa fa-users"></i> <span>کاربران</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '105')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='accesslevel'?'active':'' }}"><a href="{{ route('accesslevel') }}"><i class="fa fa-key"></i> <span>سطوح دسترسی</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '108')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='weekly-schedule'?'active':'' }}"><a href="{{ route('weekly-schedule') }}"><i class="fa fa-calendar"></i> <span>برنامه هفتگی</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '112')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='setting'?'active':'' }}"><a href="{{ route('setting') }}"><i class="fa fa-cog"></i> <span>تنظیمات</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '121')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='term'?'active':'' }}"><a href="{{ route('term') }}"><i class="fa fa-calendar-o"></i> <span>ترم</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '125')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='chart'?'active':'' }}"><a href="{{ route('chart') }}"><i class="fa fa-calendar-plus-o"></i> <span>چارت تحصیلی</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '129')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='contact'?'active':'' }}"><a href="{{ route('contact') }}"><i class="fa fa-envelope"></i> <span>صندوق پیام</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '131')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='ClassLink'?'active':'' }}"><a href="{{ route('ClassLink') }}"><i class="fa fa-envelope"></i> <span>لینک کلاس ها</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '136')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='teacher'?'active':'' }}"><a href="{{ route('teacher') }}"><i class="fa fa-graduation-cap"></i> <span>اساتید</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '134')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='ShowProject'?'active':'' }}"><a href="{{ route('ShowProject') }}"><i class="fa fa-paste"></i> <span>پروژه های دریافتی</span></a></li>
                    @endif
                @endfor
                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == '135')
                        <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='Project'?'active':'' }}"><a href="{{ route('Project') }}"><i class="fa fa-product-hunt"></i> <span>پروژه</span></a></li>
                @endif
            @endfor
                <!-- <li class="treeview">
                  <a href="#"><i class="fa fa-link"></i> <span>چند سطحی</span>
                      <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">لینک سطح ۱</a></li>
                    <li><a href="#">لینک سطح ۱</a></li>
                  </ul>
                </li> -->
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>
<script src="{{ asset('js/angular.js') }}"></script>
<!-- babakhani datepicker -->
<script src="{{ asset('js/persian-date-0.1.8.min.js') }}"></script>
<script src="{{ asset('js/persian-datepicker-0.4.5.min.js') }}"></script>
@yield('script')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
