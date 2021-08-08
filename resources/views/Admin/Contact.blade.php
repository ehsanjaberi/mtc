@extends('layouts.admin-app')
@section('title')
    پیا های دریافتی
@endsection
@section('content')
    <div ng-app="Contact" ng-controller="ContactController">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    پیام های دریافتی
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>نام</th>
                                        <th>شماره همراه</th>
                                        <th>متن پیام</th>
                                        <th>تاریخ</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @forelse($Contacts as $contact)
                                    <tr>
                                        <td class="id" hidden>{{ $contact->id }}</td>
                                        <td class="CodeTrm">{{ $contact->fullname }}</td>
                                        <td class="M" >{{ $contact->phonenumber }}</td>
                                        <td class="title">{{$contact->text}}</td>
                                        <td>{{ str_replace('-','/',\Morilog\Jalali\Jalalian::forge($contact->created_at)) }}</td>
                                        <td>
                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 130)
                                                    <a ng-click="EditAnnoun($event)" href="#" style="margin-left: 5px" data-toggle="modal" data-target="#Edit-Notifications">
                                                        <i class="fa fa-edit text-success"></i>
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
        <div class="modal modal-danger fade" id="Delete-Contact">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">حذف پیام</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>آیا میخواهید این پیام را حذف کنید!</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('DeleteContact') }}" method="post">
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
        var Contact=angular.module('Contact',[]);
        Contact.controller('ContactController',function ($scope) {


            $scope.DeleteContact=function ($event) {
                $scope.deleteid=$($event.target).parent().siblings('.id').text();
            }
        })
        $(document).ready(function () {
            $('#AddChartForm').validate({
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
            $('#EditChartForm').validate({
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
