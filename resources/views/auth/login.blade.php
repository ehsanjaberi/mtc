<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">

</head>
<body class="">
        <div class="container-fluid">
            <div class="c-login-box">
            <div class="login-logo">
                <img alt="" class="rounded-circle" src="{{ asset('img/user1-128x128.jpg ') }}" width="100px">
            </div>
            <form action="{{ route('login') }}" method="post" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="">نام کاربری</label>
                    <input type="text" class="form-control text-right" name="username" id="username" placeholder="نام کاربری" value="{{ old('username') }}">
                    <span class="fa fa-user @error('username') text-red @enderror"></span>
                    @error('username')
                    <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">رمز عبور</label>
                    <input type="password" class="form-control text-right" name="password" id="password" placeholder="رمز عبور">
                    <span class="fa fa-key @error('password') text-red @enderror"></span>
                    @error('password')
                    <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group btn-submit">
                    <button class="btn btn-success" type="submit">ورود</button>
{{--                    <a href="{{ route('register') }}" class="text-decoration-none">ثبت نام</a>--}}
                </div>
            </form>
        </div>
        </div>

</body>
</html>
