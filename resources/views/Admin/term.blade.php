@extends('layouts.admin-app')
@section('title')
    نیمسال
@endsection
@section('content')
    <div ng-app="Term" ng-controller="TermController">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   نیمسال
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
                                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 122)
                                        <a href="#" class="btn btn-primary" style="color: white" data-toggle="modal" data-target="#Add-term"><i class="fa fa-plus" style="margin-left: 5px"></i>افزودن نیمسال</a>
                                    @endif
                                @endfor
                                <div class="box-tools">

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>کد ترم</th>
                                        <th>عنوان</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @forelse($Term as $term)
                                        <tr>
                                            <td class="CodeTrm">{{ $term->CodeTrm }}</td>
                                            <td class="NameTrm">{{ $term->NameTrm }}</td>
                                            <td>
                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 123)
                                                    <a ng-click="EditTerm($event)" href="#" data-toggle="modal" class="label label-success" data-target="#Edit-Term">
                                                        ویرایش
                                                    </a>
                                                @endif
                                            @endfor
                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 124)
                                                    <a ng-click="DeleteTerm($event)" href="#" data-toggle="modal" class="label label-danger" style="margin-right: 5px" data-target="#Delete-Term">
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
        <div class="modal fade" id="Edit-Term">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">ویرایش نیمسال</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('editterm')}}" method="post" id="EditTermForm">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input ng-model="OldCodeTrm" type="text" name="OldCodeTrm" hidden>
                                    <div class="form-group">
                                        <input ng-model="ECodeTrm" type="text" id="edit_CodeTrm" name="CodeTrm" class="form-control pull-right" placeholder="کد ترم" style="height: 36px">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input ng-model="ENameTrm" type="text" id="edit_NameTrm" name="NameTrm" class="form-control pull-left" placeholder="نام ترم"  style="height: 36px">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left" id="Edit-Term-Btn">ذخیره</button>
                            <div class="circle-loader Add"></div>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal modal-danger fade" id="Delete-Term">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">حذف اطلاعیه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>آیا میخواهید نیمسال را حذف کنید!</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('deleteterm') }}" method="post">
                            @csrf
                            <input ng-model="deleteCodeTrm" type="text" id="Delete_id" name="CodeTrm" hidden>
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
        var Week=angular.module('Term',[]);
        Week.controller('TermController',function ($scope) {
            $scope.EditTerm=function ($event) {
                $scope.ECodeTrm=$($event.target).parent().siblings('.CodeTrm').text();
                $scope.OldCodeTrm=$($event.target).parent().siblings('.CodeTrm').text();
                $scope.ENameTrm=$($event.target).parent().siblings('.NameTrm').text();
            }
            $scope.DeleteTerm=function ($event) {
                $scope.deleteCodeTrm=$($event.target).parent().siblings('.CodeTrm').text();
            }
        })
        $(document).ready(function () {
            $('#AddTermForm').validate({
                rules:{
                    CodeTrm:{
                        required:true
                    },
                    NameTrm:{
                        required:true
                    },
                }
            })
            $('#EditTermForm').validate({
                rules:{
                    CodeTrm:{
                        required:true
                    },
                    NameTrm:{
                        required:true
                    },
                }
            })
        });
    </script>
@endsection
