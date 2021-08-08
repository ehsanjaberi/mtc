@extends('layouts.admin-app')
@section('title')
    داشبورد
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                داشبورد
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> داشبورد</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row text-center">
                <div class="col-md-8">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators" style="bottom: -11px">
                            @foreach($Slider as $Slide)
                                @if($loop->first)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="active"></li>
                                @else
                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($Slider as $Slide)
                                @if($loop->first)
                                    <div class="item active">
                                @else
                                    <div class="item">
                                @endif
                                <img src="{{ asset('storage/'.$Slide->image_url) }}" style="width: 100%;height: 300px">
                                </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box text-right">
                        <div class="box-header bg-info">اخبار و اطلاعیه ها</div>
                        <div class="box-body notifications">
                            <ul class="list-unstyled">
                                <li >
                                    <a href="#" class="text-black" data-toggle="modal" data-target="#Show-Notifications">
                                        عنوان اطلاعیه
                                    </a>
                                    <small class="pull-left">1روز پیش</small>
                                </li>
                                <li >
                                    <a href="#" class="text-black" data-toggle="modal" data-target="#Show-Notifications">
                                        عنوان اطلاعیه
                                    </a>
                                    <small class="pull-left">1روز پیش</small>
                                </li>
                                <li >
                                    <a href="#" class="text-black" data-toggle="modal" data-target="#Show-Notifications">
                                        عنوان اطلاعیه
                                    </a>
                                    <small class="pull-left">1روز پیش</small>
                                </li>
                                <li >
                                    <a href="#" class="text-black" data-toggle="modal" data-target="#Show-Notifications">
                                        عنوان اطلاعیه
                                    </a>
                                    <small class="pull-left">1روز پیش</small>
                                </li>
                                <li >
                                    <a href="#" class="text-black" data-toggle="modal" data-target="#Show-Notifications">
                                        عنوان اطلاعیه
                                    </a>
                                    <small class="pull-left">1روز پیش</small>
                                </li>
                            </ul>
                        </div>
                        <div class="box-footer text-center">
                            <a href="#">مشاهده همه اطلاعیه ها</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 2.5rem">
                <div class="container-fluid text-center">
                    <a href="#" class="btn btn-app">
                        <i class="fa fa-hand-pointer-o"></i>
                        انتخاب واحد
                    </a>
                    <a href="#" class="btn btn-app">
                        <i class="fa fa-calendar"></i>
                        چارت تحصیلی
                    </a>
                    <a href="#" class="btn btn-app">
                        <i class="fa fa-hand-pointer-o"></i>
                        انتخاب واحد
                    </a>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
