@extends('layouts.admin-app')
@section('title')
    پروژه
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    پروژه
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row" style="display: flex;justify-content: center">
                    <div class="col-xs-10">
                        <form action="{{ $Project ? route('EditProject'):route('AddProject') }}" method="post" id="AddProjectForm">
                            @csrf
                            <div class="box" style="margin-bottom: 0;border: 1px solid lightgray;border-bottom: 0!important; border-radius: 5px 5px 0 0!important;">
                                <div class="box-header bg-gray" style="display: flex;justify-content: start;align-items: center">
                                    <span style="flex: 1 0">اطلاعات دانشجو</span>
                                    @if($Project)
                                        @if($Project->status == 0)
                                            <small class="pull-left" style="">قبل از بررسی نهایی توسط استاد می توانید فرم را ویرایش کنید.</small>
                                            <small class="label label-info pull-left" style="padding: 8px">درحال بررسی</small>
                                        @elseif($Project->status == 1)
                                            <small class="pull-left" style="">{{ $Project->Message }}</small>
                                            <small class="label label-success pull-left" style="padding: 8px">تایید شده</small>
                                        @elseif($Project->status ==2)
                                            <small class="pull-left" style="">{{ $Project->Message }}</small>
                                            <small class="label label-danger pull-left" style="padding: 8px">تایید نشده</small>
                                        @endif
                                    @endif
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">شماره دانشجویی</label>
                                                <input type="text" class="form-control" name="CodePrsn" value="{{ $CodePrsn }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">نام و نام خانوادگی</label>
                                                <input type="text" class="form-control" value="{{ $FullName }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">کد ملی</label>
                                                <input type="text" class="form-control" value="{{ $Melli }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">مقطع</label>
                                                <input type="text" class="form-control" value="{{ $Section }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">رشته تحصیلی</label>
                                                <input type="text" class="form-control" value="{{ $Field }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">ورودی نیمسال</label>
                                                <input type="text" class="form-control" value="{{ $EnterTerm }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">نظام آموزشی</label>
                                                <input type="text" class="form-control" value="{{ $DayOrNight }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">تعداد واحد گذرانده</label>
                                                <input type="text"  class="form-control text-left" name="Countunit" value="{{ $Project ? $Project->CountUnit:'' }}" placeholder="50">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">آدرس پست الکترونیکی</label>
                                                <input type="text" class="form-control text-left" name="Email" value="{{ $Project ? $Project->Email:'' }}" placeholder="ایمیل" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">تلفن تماس ثابت</label>
                                                <input type="text" class="form-control" name="Telephone" value="{{ $Project ? $Project->Telephone:'' }}" placeholder="051-12345678" pattern="[0-9]{3}-[0-9]{8}" maxlength="12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">آدرس دقیق پستی محل سکونت</label>
                                                <input type="text" class="form-control" name="Address" value="{{ $Project ? $Project->Address:'' }}" placeholder="آدرس">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">تلفن همراه</label>
                                                <input type="text" class="form-control" name="PhoneNumber" value="{{ $Project ? $Project->PhoneNumber:'' }}" placeholder="0987-654-3210" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" maxlength="13">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">استاد پروژه</label>
                                                <select name="MasterName" id="" class="form-control">
                                                    @if($Project)
                                                        @foreach($Teacher as $teacher)
                                                            <option value="{{ $teacher->CodePrsn }}" {{ $teacher->CodePrsn==$Project->ProjectMasterCode?'selected':'' }}>{{ $teacher->User->Fname.' '.$teacher->User->Lname }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($Teacher as $teacher)
                                                            <option value="{{ $teacher->CodePrsn }}">{{ $teacher->User->Fname.' '.$teacher->User->Lname }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">استاد مشاور</label>
                                                <select name="AdvisorName" id="" class="form-control">
                                                    @if($Project)
                                                        @foreach($Teacher as $teacher)
                                                            <option value="{{ $teacher->CodePrsn }}" {{ $teacher->CodePrsn==$Project->ProjectAdvisorCode?'selected':'' }}>{{ $teacher->User->Fname.' '.$teacher->User->Lname }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($Teacher as $teacher)
                                                            <option value="{{ $teacher->CodePrsn }}">{{ $teacher->User->Fname.' '.$teacher->User->Lname }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box"style="border: 1px solid lightgray;border-top: 0!important;">
                                <div class="box-header bg-gray-light">عنوان و شرح پروژه</div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">عنوان پروژه</label>
                                                <input type="text" name="Title" value="{{ $Project ? $Project->Title:'' }}" class="form-control" placeholder="عنوان پروژه">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="" >نوع پروژه : </label>
                                                @if($Project)
                                                    @if($Project->ProjectType==0)
                                                        <label for="single">انفرادی</label>
                                                        <input type="radio" name="ProjectType" value="0" id="single" checked>
                                                        <label for="nosingle">گروهی</label>
                                                        <input type="radio" name="ProjectType" value="1" id="nosingle">
                                                    @else
                                                        <label for="single">انفرادی</label>
                                                        <input type="radio" name="ProjectType" value="0" id="single">
                                                        <label for="nosingle">گروهی</label>
                                                        <input type="radio" name="ProjectType" value="1" id="nosingle" checked>
                                                    @endif
                                                @else
                                                    <label for="single">انفرادی</label>
                                                    <input type="radio" name="ProjectType" value="0" id="single">
                                                    <label for="nosingle">گروهی</label>
                                                    <input type="radio" name="ProjectType" value="1" id="nosingle">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="">پروژه به پیشنهاد : </label>
                                                @if($Project)
                                                    @if($Project->Proposed==1)
                                                        <label for="prof">استاد</label>
                                                        <input type="radio" name="Proposal" value="1" id="prof" checked>
                                                        <label for="student">دانشجو</label>
                                                        <input type="radio" name="Proposal" value="2" id="student">
                                                        <label for="college">دانشکده</label>
                                                        <input type="radio" name="Proposal" value="3" id="college">
                                                    @elseif($Project->Proposed==2)
                                                        <label for="prof">استاد</label>
                                                        <input type="radio" name="Proposal" value="1" id="prof">
                                                        <label for="student">دانشجو</label>
                                                        <input type="radio" name="Proposal" value="2" id="student" checked>
                                                        <label for="college">دانشکده</label>
                                                        <input type="radio" name="Proposal" value="3" id="college">
                                                    @elseif($Project->Proposed==3)
                                                        <label for="prof">استاد</label>
                                                        <input type="radio" name="Proposal" value="1" id="prof">
                                                        <label for="student">دانشجو</label>
                                                        <input type="radio" name="Proposal" value="2" id="student">
                                                        <label for="college">دانشکده</label>
                                                        <input type="radio" name="Proposal" value="3" id="college" checked>
                                                    @endif
                                                @else
                                                    <label for="prof">استاد</label>
                                                    <input type="radio" name="Proposal" value="1" id="prof">
                                                    <label for="student">دانشجو</label>
                                                    <input type="radio" name="Proposal" value="2" id="student">
                                                    <label for="college">دانشکده</label>
                                                    <input type="radio" name="Proposal" value="3" id="college">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">اگر پروژه گروهی باشد نام اعضای گروه:</label>
                                                <input name="G_Members" class="form-control" id="" value="{{ $Project ? $Project->GroupMember:''}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">شرح خلاصه ای از عنوان و اهداف پروژه:</label>
                                                <textarea name="Summary" class="form-control" id="" cols="30" rows="10">{{ $Project ? $Project->Summary:''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">امکانات و تجهیزات مورد نیاز و راه های دسترسی به آن:</label>
                                                <textarea name="Equipment" class="form-control" id="" cols="30" rows="10">{{ $Project ? $Project->Equipment:''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">روش انجام کار(به طور مشروح):</label>
                                                <textarea name="HowdoJob" class="form-control" id="" cols="30" rows="10">{{ $Project ? $Project->HowDoJob:''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer bg-gray-light">
                                    @if($Project)
                                        @if($Project->status == 1)
                                            <small class="label label-success pull-left" style="padding: 8px">تایید شده</small>
                                        @elseif($Project->status == 2)
                                            <button type="submit" class="btn btn-success pull-left">ویرایش فرم</button>
                                        @endif
                                    @else
                                        <button type="submit" class="btn btn-primary pull-left">ثبت فرم</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validation/localization/messages_fa.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#AddProjectForm').validate({
                rules:{
                    Countunit:{
                        required:true
                    },
                    Email:{
                        required:true
                    },
                    Telephone:{
                        required:true
                    },
                    PhoneNumber:{
                        required:true
                    },
                    Address:{
                        required:true
                    },
                    MasterName:{
                        required:true
                    },

                    AdvisorName:{
                        required:true
                    },
                    Title:{
                        required:true
                    },
                    ProjectType:{
                        required:true
                    },
                    Proposal:{
                        required:true
                    },
                    Summary:{
                        required:true
                    },
                    Equipment:{
                        required:true
                    },
                    HowdoJob:{
                        required:true
                    },
                }
            })
        })
    </script>
@endsection

