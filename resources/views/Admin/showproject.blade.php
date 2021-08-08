@extends('layouts.admin-app')
@section('title')
    پروژه ها
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    پروژه ها
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
{{--                                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)--}}
{{--                                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 101)--}}
{{--                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Add-User">افزودن کاربر</a>--}}
{{--                                    @endif--}}
{{--                                @endfor--}}
                                <div class="box-tools" style="top: 10px;position:static;float: left;">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding" id="datatabel">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره دانشجویی</th>
                                        <th>نام</th>
                                        <th>عنوان</th>
                                        <th>استاد پروژه</th>
                                        <th>استاد مشاور</th>
                                        <th>پیشنهاد پروژه</th>
                                        <th>تاریخ ارسال</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                    @forelse($Project as $project)
                                        <tr>
                                            <td class="CodePrsn">{{ $project->CodePrsn }}</td>
                                            <td class="Name">{{ $project->Student->Fname.' '. $project->Student->Lname}}</td>
                                            <td class="">{{ $project->Title }}</td>
                                            <td class="">{{ $project->Master->Fname.' '.$project->Master->Lname }}</td>
                                            <td class="">{{ $project->Advisor->Fname.' '.$project->Advisor->Lname }}</td>
                                            <td class="">
                                                @switch($project->Proposed)
                                                    @case(1)
                                                        استاد
                                                    @break
                                                    @case(2)
                                                    دانشجو
                                                    @break
                                                    @case(3)
                                                    دانشکده
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>{{ str_replace('-','/',\Morilog\Jalali\Jalalian::forge($project->created_at))  }}</td>
                                            <td>
                                                @if($project->status==0)
                                                    <a href="#" data-toggle="modal" class="DeleteUser" data-target="#denial" onclick="Denial({{$project->CodePrsn}})"><span class="label label-danger">عدم پذیرش</span></a>
                                                    <a href="#" data-toggle="modal" class="EditUser" data-target="#accept" onclick="Accept({{$project->CodePrsn}})"><span class="label label-success">پذیرش</span></a>
                                                @elseif($project->status==1)
                                                    <a href="#" data-toggle="modal" class="DeleteUser" data-target="#denial" onclick="Denial({{$project->CodePrsn}})"><span class="label label-danger">عدم پذیرش</span></a>
                                                @elseif($project->status==2)
                                                    <a href="#" data-toggle="modal" class="EditUser" data-target="#accept" onclick="Accept({{$project->CodePrsn}})"><span class="label label-success">پذیرش</span></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center bg-gray-light">سطری پیدا نشد</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <!-- pagination -->
                        <div class="text-center">
{{--                           {{ $Users->links() }}--}}
                        </div>
                        <!-- /.pagination -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div class="modal modal-danger fade" id="denial">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">حذف پذیرش</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('DenialProject') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <p>آیا می خواهید این پروژه را رد کنید؟</p>
                            <label for="Msg">متن پیام</label>
                            <input type="text" id="Msg" name="Msg" class="form-control">
                        </div>
                        <div class="modal-footer">

                                <input type="text" id="DenialCode" name="Code" hidden>
                                 <button class="btn btn-outline pull-left">عدم پذیرش</button>
                                <button type="reset" class="btn btn-outline pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal modal-success fade" id="accept">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">پذیرش پروژه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('AcceptProject') }}" method="post">
                        <div class="modal-body">
                            <p>آیا می خواید این پروژه را قبول کنید؟ </p>
                            <label for="Msg">متن پیام</label>
                            <input type="text" id="Msg" name="Msg" class="form-control">
                        </div>
                        <div class="modal-footer">
                                @csrf
                                <input type="text" id="AcceptCode" name="Code" hidden>
                                 <button class="btn btn-outline pull-left">پذیرش</button>
                                <button type="reset" class="btn btn-outline pull-right" data-dismiss="modal">عدم پذیرش</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        function Denial(Code) {
            document.getElementById('DenialCode').value=Code;
        }
        function Accept(Code) {
            document.getElementById('AcceptCode').value=Code;
        }
    </script>
@endsection
