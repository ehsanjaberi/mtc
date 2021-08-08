<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>انستیتو کامپیوتر | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="{{ asset('img/icon/icon.png') }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid" id="home-section">
    <header class="header">
        <div class="logo">
            <img src="{{ asset('img/logo.jpg') }}" width="50px" alt="">
        </div>
        <div class="toggle-nav">
            <a class="toggle-btn toggle-show" id="toggle-btn">
                <span class="toggle-icon"></span>
                <span class="toggle-icon"></span>
                <span class="toggle-icon"></span>
            </a>
            <ul class="toggle-menu">
                <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='index'?'active-menu-mobile':'' }}">
                    <a href="{{ route('index') }}" class="toggle-scroll">
                        <i class="fa fa-home"></i>
                        صفحه اصلی
                    </a>
                </li>
                <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='announcements'?'active-menu-mobile':'' }}">
                    <a href="{{route('announcements')}}" class="toggle-scroll">
                        <i class="fa fa-newspaper-o"></i>
                        اخبار و اطلاعیه ها
                    </a>
                </li>
                <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='weeklySchedule'?'active-menu-mobile':'' }}">
                    <a href="{{route('weeklySchedule')}}" class="toggle-scroll">
                        <i class="fa fa-calendar"></i>
                        برنامه هفتگی و چارت تحصیلی
                    </a>
                </li>
                <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='classlinks'?'active-menu-mobile':'' }}">
                    <a href="{{route('classlinks')}}" class="toggle-scroll">
                        <i class="fa fa-link"></i>
                        لینک کلاس ها
                    </a>
                </li>
                <li >
                    <a href="{{route('login')}}" class="toggle-scroll">
                        <i class="fa fa-sign-in"></i>
                        ورود به پرتال
                    </a>
                </li>
{{--                <li class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='about-us'?'active-menu-mobile':'' }}">--}}
{{--                    <a href="{{ route('about-us') }}" class="toggle-scroll">--}}
{{--                        <i class="fa fa-wifi"></i>--}}
{{--                        درباره ما--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
        <div class="header-menu">
            <a href="{{ route('index') }}" class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='index'?'active-menu':'' }}">صفحه اصلی</a>
            <a href="{{ route('announcements') }}" class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='announcements'?'active-menu':'' }}">اخبار و اطلاعیه ها</a>
            <a href="{{ route('weeklySchedule') }}" class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='weeklySchedule'?'active-menu':'' }}">برنامه هفتگی و چارت تحصیلی</a>
            <a href="{{ route('classlinks') }}" class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='classlinks'?'active-menu':'' }}">لینک کلاس</a>
            <a href="{{ route('login') }}">ورود به پرتال</a>

{{--            <a href="{{ route('about-us') }}" class="{{ \Illuminate\Support\Facades\Route::current()->getName()==='about-us'?'active-menu':'' }}">درباره ما</a>--}}
        </div>
{{--        <ul class="quick-access">--}}
{{--            <li class="dropdown ">--}}
{{--                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle fa-2x"></i></a>--}}
{{--                <ul class="dropdown-menu custom">--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-user"></i>--}}
{{--                            پروفایل--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-envelope-open-o"></i>--}}
{{--                            پیام ها--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="divider"></li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-sign-out"></i>--}}
{{--                            خروج--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
    </header>
{{--    content--}}
    @yield('content')
{{--    end-content--}}
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" style="display: flex;justify-content: center;align-items: center">
                    <ul class="list-unstyled footer-link">
                        <li>
                            دسترسی سریع
                        </li>
                        <li>
                            <a href="{{ route('index') }}">
                                <i class="fa fa-home"></i>
                                صفحه اصلی
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('announcements') }}">
                                <i class="fa fa-newspaper-o"></i>
                                اخبار و اطلاعیه ها
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('weeklySchedule') }}">
                                <i class="fa fa-calendar"></i>
                                برنامه هفتگی و چارت تحصیلی
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('classlinks') }}">
                                <i class="fa fa-link"></i>
                                لینک کلاس ها
                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{ route('about-us') }}">--}}
{{--                                <i class="fa fa-clone"></i>--}}
{{--                                درباره ما--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="footer-logo text-center">
                        <a href="#">
                            <img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="50px" class="img-rounded">
                        </a>
                    </div>
                    <ul class="social" style="margin-top: 40px">
                        <li><a href="#"><i class="fa fa-telegram"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                    <div class="footer-support text-center">
                        <span class="number">گروه کامپیوتر</span>
                        <span class="mail">دانشکده فنی منتظری مشهد</span>
                    </div>
                </div>
                <div class="col-lg-4" style="display: flex;justify-content: center;align-items: center">
                    <!--                    <form action="" method="post">-->
                    <!--                        <label for="kh-email" class="text-gray">عضویت در خبرنامه</label>-->
                    <!--                        <div class="input-group">-->
                    <!--                            <input type="text" name="email" id="kh-email" class="form-control" placeholder="ایمیل">-->
                    <!--                            <div class="input-group-btn">-->
                    <!--                                <button class="btn btn-primary">ارسال</button>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </form>-->
                </div>
            </div>
        </div>
    </section>

    <!--    </div>-->
</div>

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/axios.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
@yield('script')
<script>
    $(function () {
        $('.toggle-show').click(function () {
            $('#toggle-btn').toggleClass('active');
            $('.toggle-menu').toggleClass('show-toggle-menu');
        })
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
