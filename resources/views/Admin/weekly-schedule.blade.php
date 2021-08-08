@extends('layouts.admin-app')
@section('title')
    برنامه هفتگی
@endsection
@section('content')
    <div ng-app="Week" ng-controller="WeekController">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    برنامه هفتگی
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
                                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 109)
                                        <a href="#" class="btn btn-primary" style="color: white" data-toggle="modal" data-target="#Add-Week"><i class="fa fa-plus" style="margin-left: 5px"></i>افزودن برنامه هفتگی</a>
                                    @endif
                                @endfor
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>نیمسال</th>
                                        <th>مقطع</th>
                                        <th>عنوان</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>پیوست</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @forelse($WeekSh as $week)
                                    <tr>
                                        <td class="id" hidden>{{ $week->id }}</td>
                                        <td class="CodeTrm" hidden>{{ $week->Term->CodeTrm }}</td>
                                        <td class="M" hidden>{{ $week->M }}</td>
                                        <td>{{$week->Term->NameTrm}}</td>
                                        <td>{{ $week->M==0?'کاردانی':'کارشناسی' }}</td>
                                        <td class="title">{{$week->title}}</td>
                                        <td>{{  str_replace('-','/',\Morilog\Jalali\Jalalian::forge($week->created_at)) }}</td>
                                        <td>{{ $week->attachment!=null ? 'فایل پیوست دارد' : 'فایل پیوست ندارد' }}</td>
                                        <td>
                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 110)
                                                    <a ng-click="EditWeekSh($event)" href="#" data-toggle="modal" class="label label-success" data-target="#Edit-Week">
                                                        ویرایش
                                                    </a>
                                                @endif
                                            @endfor
                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 111)
                                                        <a ng-click="DeleteWeekSh($event)" href="#" data-toggle="modal" class="label label-danger" style="margin-right: 5px" data-target="#Delete-Week">
                                                            حذف
                                                        </a>
                                                @endif
                                            @endfor
                                        </td>
                                    </tr>
                                    @empty
                                        <tr><td colspan="7" class="bg-gray-light" style="text-align: center;">سطری یافت نشد!</td></tr>
                                    @endforelse
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
        <div class="modal fade" id="Add-term">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="display: flex">
                    <h4 class="modal-title" style="margin-left: auto">افزودن نیم سال تحصیلی</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('AddTerm')}}" method="post" id="AddTermForm">
                <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="CodeTrm" name="CodeTrm" class="form-control pull-right" placeholder="کد ترم" style="height: 36px">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="NameTrm" name="NameTrm" class="form-control pull-left" placeholder="نام ترم"  style="height: 36px">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left" id="Add-Term-Btn">ذخیره</button>
                    <div class="circle-loader Add"></div>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        <div class="modal fade" id="Add-Week">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">افزودن برنامه هفتگی</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('Addweekly-schedule')}}" method="post" id="AddWeekShForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="term">نیمسال</label>
                                    <select name="term" id="term" class="form-control">
                                        @foreach($Term as $term)
                                            <option value="{{ $term->CodeTrm }}">{{ $term->NameTrm }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="M">مقطع</label>
                                    <select name="M" id="M" class="form-control">
                                        <option value="0">کاردانی</option>
                                        <option value="1">کارشناسی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="">عنوان</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان">
                                </div>
                                <div class="col-md-6">
                                    <label class="btn-upload" for="upload">انتخاب فایل</label>
                                    <input type="file" class="form-control" id="attachment" name="attachment">
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
        <div class="modal fade" id="Edit-Week">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">ویرایش برنامه هفتگی</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('Editweekly-schedule')}}" method="post" id="EditWeekShForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="term">نیمسال</label>
                                    <input type="text" name="id" ng-model="editWeek_id" hidden>
                                    <select ng-model="edit_term" name="term" id="edit_term" class="form-control">
                                        @foreach($Term as $term)
                                            <option value="{{ $term->CodeTrm }}">{{ $term->NameTrm }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="M">مقطع</label>
                                    <select ng-model="edit_M" name="M" id="edit_M" class="form-control">
                                        <option value="0">کاردانی</option>
                                        <option value="1">کارشناسی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 25px">
                                <div class="col-md-6">
                                    <label for="">عنوان</label>
                                    <input ng-model="edit_title" type="text" class="form-control" name="title" id="edit_title" placeholder="عنوان">
                                </div>
                                <div class="col-md-6">
                                    <label class="btn-upload" for="upload">انتخاب فایل</label>
                                    <input type="file" class="form-control" id="edit_attachment" name="attachment">
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
        <div class="modal modal-danger fade" id="Delete-Week">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">حذف اطلاعیه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>آیا میخواهید اطلاعیه را حذف کنید!</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('Deleteweekly-schedule') }}" method="post">
                            @csrf
                            <input ng-model="deleteid" type="text" id="Delete_id" name="id" hidden>
                            <button class="btn btn-outline pull-left">حذف</button>
                            <button type="reset" class="btn btn-outline pull-right" data-dismiss="modal">انصراف</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validation/localization/messages_fa.min.js') }}"></script>
    <script>
        var Week=angular.module('Week',[]);
        Week.controller('WeekController',function ($scope) {
            $scope.AddWeekSh=function($event){
                // console.log($($event.target).siblings('.M').text())
                $scope.M= $($event.target).siblings('.M').text();
                $scope.term= $($event.target).siblings('.CodeTrm').text();
                // $scope.EditId= $($event.target).parent().parent().siblings('.id').text();
                // $($event.target).parent().siblings('.ExitEditAccessLevel').css('display','initial')
            };
            $scope.EditWeekSh=function ($event) {
                $CodeTerm=$($event.target).parent().siblings('.CodeTrm').text();
                $M=$($event.target).parent().siblings('.M').text();
                $option=document.getElementById('edit_term').getElementsByTagName('option');
                $Moption=document.getElementById('edit_M').getElementsByTagName('option');
                for (var i=0;i<$option.length;i++)
                {
                    $CodeTerm===$option[i].value ? $option[i].selected='selected':''
                }
                for(var j=0;j<$Moption.length;j++)
                {
                    $M===$Moption[j].value ? $Moption[j].selected='selected':'';
                }
                $scope.edit_title=$($event.target).parent().siblings('.title').text();
                $scope.editWeek_id=$($event.target).parent().siblings('.id').text();
            }
            $scope.DeleteWeekSh=function ($event) {
                $scope.deleteid=$($event.target).parent().siblings('.id').text();
            }
        })
        $(document).ready(function () {
            $('#AddWeekShForm').validate({
                rules:{
                    title:{
                        required:true
                    },
                    attachment:{
                        required:true
                    },
                    M:{
                        required:true
                    },
                    term:{
                        required:true
                    }
                }
            })
            $('#EditWeekShForm').validate({
                rules:{
                    title:{
                        required:true
                    },
                    attachment:{
                        required:false
                    },
                    M:{
                        required:true
                    },
                    term:{
                        required:true
                    }
                }
            })
        });
    </script>
@endsection
