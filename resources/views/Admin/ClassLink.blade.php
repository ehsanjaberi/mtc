@extends('layouts.admin-app')
@section('title')
    لینک کلاس ها
@endsection
@section('content')
    <div ng-app="Class" ng-controller="ClassController">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    لینک کلاس ها
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 132)
                                        <a href="#" class="btn btn-primary" style="color: white" data-toggle="modal" data-target="#Add-Class"><i class="fa fa-plus" style="margin-left: 5px"></i>افزودن کلاس</a>
                                    @endif
                                @endfor
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-striped">
                                    <tr class="bg-gray">
                                        <th style="width: 10px">#</th>
                                        <th>کد ارائه</th>
                                        <th>کد درس</th>
                                        <th>عنوان درس</th>
                                        <th>زمان برگزرای</th>
                                        <th>لینک کلاس</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @foreach($Class as $class)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td class="ERCode">{{ $class->ERCode }}</td>
                                            <td class="Code">{{ $class->LessonCode }}</td>
                                            <td class="Title">{{ $class->LessonTitle }}</td>
                                            <td class="Day" hidden>{{ $class->DayOfWeek }}</td>
                                            <td class="StartTime" hidden>{{ $class->StartTime }}</td>
                                            <td class="EndTime" hidden>{{ $class->EndTime }}</td>
                                            <td class="TeacherName" hidden>{{ $class->TeacherName }}</td>
                                            <td class="ClassLink" hidden>{{ $class->ClassLink }}</td>

                                            <td>
                                                @if($class->DayOfWeek)
                                                    {{ $class->DayOfWeek }}
                                                    از
                                                    {{ $class->StartTime}}
                                                    تا
                                                    {{ $class->EndTime }}
                                                @else
                                                    <span>مشخص نشده</span>
                                            @endif
                                            <td>
                                                @if($class->ClassLink)
                                                    <a href="{{ $class->ClassLink }}" target="_blank">{{ $class->TeacherName }}</a>
                                                @else
                                                    <span>{{ $class->TeacherName }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 133)
                                                        <a ng-click="EditClass($event)" href="#" data-toggle="modal" class="label label-success" data-target="#Edit-Class">
                                                            ویرایش
                                                        </a>
                                                    @endif
                                                @endfor
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <div class="modal fade" id="Add-Class">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">افزودن کلاس</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('AddClass')}}" method="post" id="AddClassForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="">کد ارائه</label>
                                    <input type="text" class="form-control" name="ERCode" id="ERCode" placeholder="کد ارائه">
                                </div>
                                <div class="col-md-6">
                                    <label for="">کد درس</label>
                                    <input type="text" class="form-control" name="Code" id="Code" placeholder="کد درس">
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="">عنوان درس</label>
                                    <input type="text" class="form-control" name="Name" id="Name" placeholder="عنوان درس">
                                </div>
                                <div class="col-md-6">
                                    <label for="term">روز برگزاری</label>
                                    <select name="Day" id="Day" class="form-control">
                                        <option value="">مشخص نشده</option>
                                        <option value="شنبه">شنبه</option>
                                        <option value="یک شنبه">یک شنبه</option>
                                        <option value="دوشنبه">دو شنبه</option>
                                        <option value="سه شنبه">سه شنبه</option>
                                        <option value="چهارشنبه">چهار شنبه</option>
                                        <option value="پنج شنبه">پنج شنبه</option>
                                        <option value="جمعه">جمعه</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="StartTime">ساعت شروع</label>
                                    <input type="text" class="form-control" name="StartTime" id="StartTime">
                                </div>
                                <div class="col-md-6">
                                    <label for="EndTime">ساعت پایان</label>
                                    <input type="text" class="form-control" name="EndTime" id="EndTime">
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="TeacherName">نام استاد</label>
                                    <input type="text" class="form-control" id="TeacherName" name="TeacherName">
                                </div>
                                <div class="col-md-6">
                                    <label for="ClassLink">لینک کلاس</label>
                                    <input type="text" class="form-control" id="ClassLink" name="ClassLink">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                            <div class="circle-loader Add"></div>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="Edit-Class">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">ویرایش کلاس</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('EditClass')}}" method="post" id="AddClassForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="">کد ارائه</label>
                                    <input ng-model="ercode" type="text" class="form-control" name="ERCode" id="ERCode" placeholder="کد ارائه">
                                </div>
                                <div class="col-md-6">
                                    <label for="">کد درس</label>
                                    <input ng-model="oldcode" type="text" name="OldCode" id="edit_OldCode" hidden>
                                    <input ng-model="code" type="text" class="form-control" name="Code" id="edit_Code" placeholder="کد درس">
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="">عنوان درس</label>
                                    <input ng-model="name" type="text" class="form-control" name="Name" id="edit_Name" placeholder="عنوان درس">
                                </div>
                                <div class="col-md-6">
                                    <label for="term">روز برگزاری</label>
                                    <select ng-model="day" name="Day" id="edit_Day" class="form-control">
                                        <option value="">مشخص نشده</option>
                                        <option value="شنبه">شنبه</option>
                                        <option value="یک شنبه">یک شنبه</option>
                                        <option value="دوشنبه">دو شنبه</option>
                                        <option value="سه شنبه">سه شنبه</option>
                                        <option value="چهارشنبه">چهار شنبه</option>
                                        <option value="پنج شنبه">پنج شنبه</option>
                                        <option value="جمعه">جمعه</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="StartTime">ساعت شروع</label>
                                    <input ng-model="start" type="text" class="form-control" name="StartTime" id="edit_StartTime">
                                </div>
                                <div class="col-md-6">
                                    <label for="EndTime">ساعت پایان</label>
                                    <input ng-model="end" type="text" class="form-control" name="EndTime" id="edit_EndTime">
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="TeacherName">نام استاد</label>
                                    <input ng-model="teachername" type="text" class="form-control" id="edit_TeacherName" name="TeacherName">
                                </div>
                                <div class="col-md-6">
                                    <label for="ClassLink">لینک کلاس</label>
                                    <input ng-model="classlink" type="text" class="form-control" id="edit_ClassLink" name="ClassLink">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success pull-left">ویرایش</button>
                            <div class="circle-loader Add"></div>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
{{--        <div class="modal modal-danger fade" id="Delete-Class">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header" style="display:flex;">--}}
{{--                        <h4 class="modal-title" style="margin-left: auto">حذف اطلاعیه</h4>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span></button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <p>آیا میخواهید اطلاعیه را حذف کنید!</p>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <form action="{{ route('Deleteweekly-schedule') }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input ng-model="deleteid" type="text" id="Delete_id" name="id" hidden>--}}
{{--                            <button class="btn btn-outline pull-left">حذف</button>--}}
{{--                            <button type="reset" class="btn btn-outline pull-right" data-dismiss="modal">انصراف</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.modal-content -->--}}
{{--            </div>--}}
{{--            <!-- /.modal-dialog -->--}}
{{--        </div>--}}
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validation/localization/messages_fa.min.js') }}"></script>
    <script>
        var Class=angular.module('Class',[]);
        Class.controller('ClassController',function ($scope) {
            $scope.EditClass=function ($event) {
                $scope.oldcode=$($event.target).parent().siblings('.ERCode').text();
                $scope.ercode=$($event.target).parent().siblings('.ERCode').text();
                $scope.code=$($event.target).parent().siblings('.Code').text();
                $scope.name=$($event.target).parent().siblings('.Title').text();
                $scope.day=$($event.target).parent().siblings('.Day').text();
                $scope.start=$($event.target).parent().siblings('.StartTime').text();
                $scope.end=$($event.target).parent().siblings('.EndTime').text();
                $scope.teachername=$($event.target).parent().siblings('.TeacherName').text();
                $scope.classlink=$($event.target).parent().siblings('.ClassLink').text();


            }

        })
        $(document).ready(function () {
            $('#AddClassForm').validate({
                rules:{
                    ERCode:{
                        required:true
                    },
                    Code:{
                        required:true
                    },
                    Name:{
                        required:true
                    },
                    Day:{
                        required:false
                    },
                    StartTime:{
                        required:false
                    },
                    EndTime:{
                        required:false
                    },
                    TeacherName:{
                        required:true
                    },
                    ClassLink:{
                        required:false
                    }


                }
            })
            $('#EditClassForm').validate({
                rules:{
                    Code:{
                        required:true
                    },
                    Name:{
                        required:true
                    },
                    Day:{
                        required:false
                    },
                    StartTime:{
                        required:false
                    },
                    EndTime:{
                        required:false
                    },
                    TeacherName:{
                        required:true
                    },
                    ClassLink:{
                        required:false
                    }


                }
            })
        });
    </script>
@endsection
