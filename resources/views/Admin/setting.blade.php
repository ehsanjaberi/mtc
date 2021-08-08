@extends('layouts.admin-app')
@section('title')
    تنظیمات
@endsection
@section('content')
    <div ng-app="Setting" ng-controller="SettingController">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    تنظیمات
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                        @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 113)
                            <div class="col-md-6 table-responsive">
                                <div class="box">
                                    <div class="box-header">
                                        <span>اسلایدر</span>
                                        @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                            @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 114)
                                                <a href="#" class="btn btn-primary pull-left" data-toggle="modal" data-target="#Add-Slide">افزودن عکس<i class="fa fa-plus" style="margin-right: 2px;"></i></a>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-hover">
                                            <tr class="table-thead">
                                                <td>ردیف</td>
                                                <td>تاریخ شروع</td>
                                                <td>تاریخ پایان</td>
                                                <td class="text-center">عملیات</td>
                                            </tr>
                                            @forelse($Slider as $Slide)
                                                <tr>
                                                    <td class="slideimage" style="display: none">{{ $Slide->image_url }}</td>
                                                    <td class="slideid" hidden>{{ $Slide->id }}</td>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td class="startdate">{{ str_replace('-','/',$Slide->StartDate) }}</td>
                                                    <td class="enddate">{{ str_replace('-','/',$Slide->EndDate) }}</td>
                                                    <td class="text-left">
                                                        @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                            @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 116)
                                                                <a ng-click="DeleteSlide($event)" href="#" class="" data-toggle="modal" data-target="#Delete-Slide">
                                                                    <i class="fa fa-trash text-danger" style="margin-left: 5px" ></i>
                                                                </a>
                                                            @endif
                                                        @endfor
                                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 115)
                                                                    <a ng-click="SlideEdit($event)" href="#" style="margin-left: 5px" data-toggle="modal" data-target="#Edit-Slide">
                                                                        <i class="fa fa-edit text-success"></i>
                                                                    </a>
                                                                @endif
                                                            @endfor

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="4" class="bg-gray-light" style="text-align: center;">سطری یافت نشد!</td></tr>
                                            @endforelse
                                        </table>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endfor
                    @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                        @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 117)
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header">
                                        <span>اخبار و اطلاعیه ها</span>
                                        @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                            @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 118)
                                                <a href="#" class="btn btn-primary pull-left" data-toggle="modal" data-target="#Add-Notifications">افزودن اطلاعیه<i class="fa fa-plus" style="margin-right: 2px;"></i></a>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="box-body" style="padding: 15px;">
                                        <table class="table table-hover">
                                            <tr class="table-thead">
                                                <td>عنوان</td>
                                                <td>متن اطلاعیه</td>
                                                {{--                                        <td>تاریخ</td>--}}
                                                <td class="text-left">عملیات</td>
                                            </tr>
                                            @forelse($Announcements as $Announcement)
                                                <tr>
                                                    <td class="ErCode" hidden>{{$Announcement->ClassLink}}</td>
                                                    <td class="Aid" hidden>{{$Announcement->id}}</td>
                                                    <td class="Atitle" style="position:relative;">{{ $Announcement->title }}</td>
                                                    <td class="Atext">{{ $Announcement->text }}</td>
                                                    {{--                                        <td>{{ $Announcement->created_at }}</td>--}}
                                                    <td class="text-left" style="position:relative;">
                                                        @if($Announcement->attachment)
                                                            <a  href="{{ route('View',['announ',$Announcement->id]) }}" style="margin-left: 5px" >
                                                                <i class="fa fa-paperclip"></i>
                                                            </a>
                                                        @endif
                                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 120)
                                                                    <a ng-click="DeleteAnnoun($event)" href="#" class="" data-toggle="modal" data-target="#Delete-Notifications">
                                                                        <i class="fa fa-trash text-danger" style="margin-left: 5px" ></i>
                                                                    </a>
                                                                @endif
                                                            @endfor
                                                            @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                                @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 119)
                                                                    <a ng-click="EditAnnoun($event)" href="#" style="margin-left: 5px" data-toggle="modal" data-target="#Edit-Notifications">
                                                                        <i class="fa fa-edit text-success"></i>
                                                                    </a>
                                                                @endif
                                                            @endfor
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="3" class="bg-gray-light" style="text-align: center;">سطری یافت نشد!</td></tr>
                                            @endforelse
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        {{--Announcement--}}
        <div class="modal fade" id="Add-Notifications">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">افزودن اطلاعیه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('AddAnnouncement') }}" method="post" enctype="multipart/form-data" id="AddAnnouncementForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">عنوان اطلاعیه</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان اطلاعیه">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">متن اطلاعیه</label>
                                        <textarea class="form-control" name="text" id="text" placeholder="متن اطلاعیه"></textarea>
                                        @error('text')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">پیوست</label>
                                        <input type="file" class="form-control" name="attachment" id="attachment">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>لینک به درس</label>
                                        <select name="ClassLink" class="form-control">
                                            <option value="">بدون لینک</option>
                                            @foreach($Class as $class)
                                                <option value="{{ $class->ERCode }}">
                                                    {{ $class->LessonCode }}
                                                    [{{ $class->LessonTitle }}]
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left" id="Add-Announcement-Btn">ذخیره</button>
                            <div class="circle-loader Add"></div>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="Edit-Notifications">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">ویرایش اطلاعیه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('EditAnnouncement') }}" method="post" id="EditAnnouncementForm">
                        @csrf
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">عنوان اطلاعیه</label>
                                            <input type="text" ng-model="EditAid" name="id" hidden>
                                            <input ng-model="EditAtitle" name="title" id="edit_title" type="text" class="form-control" placeholder="عنوان اطلاعیه">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">متن اطلاعیه</label>
                                            <textarea ng-model="EditAtext" name="text" id="edit_text" class="form-control" placeholder="متن اطلاعیه"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">پیوست</label>
                                            <input name="attachment" id="edit_attachment" type="file" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" class="" value="1" name="removeattachment" id="removeattachment">
                                            <label for="removeattachment">حذف پیوست</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>لینک به درس</label>
                                            <select ng-model="EditERCode" name="ClassLink" id="edit_ClassLink" class="form-control">
                                                <option value="">بدون لینک</option>
                                                @foreach($Class as $class)
                                                    <option value="{{ $class->ERCode }}">
                                                        {{ $class->LessonCode }}
                                                        [{{ $class->LessonTitle }}]
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="Edit-Announcement-Btn" class="btn btn-primary pull-left">ویرایش</button>
                            <div class="circle-loader Edit"></div>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal modal-danger fade " id="Delete-Notifications">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">حذف اطلاعیه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>آیا میخواهید این اطلاعیه را حذف کنید!</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('DeleteAnnouncement')}}" method="post">
                            @csrf
                            <input type="text" name="id" ng-model="DeleteAid" hidden>
                            <button type="submit" class="btn btn-outline pull-left">بله</button>
                            <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">خیر</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{--    Slider--}}
        <div class="modal fade" id="Add-Slide">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">افزودن عکس</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('AddSlider') }}" method="post" enctype="multipart/form-data" id="AddSlideForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">آپلود تصویر</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">تاریخ شروع نمایش</label>
                                        <input type="text" class="form-control" name="StartDate" id="StartDate" autocomplete="off">
                                        <div class="range-from-example"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">تاریخ پایان نمایش</label>
                                        <input type="text" class="form-control" name="EndDate" id="EndDate" autocomplete="off">
                                        <div class="range-to-example"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left" id="Add-Slider-Btn">ذخیره</button>
                            <div class="circle-loader Add"></div>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="Edit-Slide">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">ویرایش اسلاید</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('EditSlider') }}" method="post" enctype="multipart/form-data" id="EditSlideForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">آپلود تصویر</label>
                                        <input ng-model="SlideId" type="text" name="id" id="edit_slide_id" hidden>
                                        <input type="file" onchange="angular.element(this).scope().showafterupload(event)" class="form-control" name="image" id="edit_image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img  class="" id="Edit-Show-Img" ng-src="@{{ showimg }}" width="260" height="113" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">تاریخ شروع نمایش</label>
                                        <input ng-model="StartDate" type="text" class="form-control" name="StartDate" id="edit_StartDate">
                                        <div class="range-from-example"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">تاریخ پایان نمایش</label>
                                        <input ng-model="EndDate" type="text" class="form-control" name="EndDate" id="edit_EndDate">
                                        <div class="range-to-example"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left" id="Edit-Slider-Btn">ذخیره</button>
                            <div class="circle-loader Edit"></div>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal modal-danger fade " id="Delete-Slide">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">حذف اسلاید</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>آیا میخواهید این اسلاید را حذف کنید!</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('DeleteSlider') }}" method="post">
                            @csrf
                            <input type="text" ng-model="SlideDeleteId" name="id" id="slide_delete_id" hidden>
                            <button type="submit" class="btn btn-outline pull-left">حذف</button>
                            <button type="reset" class="btn btn-outline pull-right" data-dismiss="modal">انصراف</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="show-image">
            <img src="{{ asset('img/slider/011.jpg') }}" alt="">
        </div>
    </div>
@endsection
@section('script')
    <script>
        var Setting=angular.module('Setting',[]);
        Setting.controller('SettingController',function ($scope) {
        //Slider
            $scope.SlideEdit=function($event){
                $scope.showimg='/storage/'+$($event.target).parent().parent().siblings('.slideimage').text();
                $scope.SlideId=$($event.target).parent().parent().siblings('.slideid').text();
                $scope.StartDate= $($event.target).parent().parent().siblings('.startdate').text();
                $scope.EndDate= $($event.target).parent().parent().siblings('.enddate').text();
                $($event.target).parent().siblings('.ExitEditAccessLevel').css('display','initial')
                $('#Edit-Show-Img').attr('src',$scope.showimg);
            };
            $scope.showafterupload=function (e) {
                if (e.target.files && e.target.files[0])
                {
                    var reader=new FileReader();
                    reader.onload=function (e) {
                        $('#Edit-Show-Img').attr('src',e.target.result);
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            };
            $scope.DeleteSlide=function ($event) {
                $scope.SlideDeleteId=$($event.target).parent().parent().siblings('.slideid').text();
            }
        //Announcements
            $scope.EditAnnoun=function ($event) {
                // console.log($($event.target).parent().parent().siblings('.Atitle').text());
                $scope.EditAtitle=$($event.target).parent().parent().siblings('.Atitle').text()
                $scope.EditAtext=$($event.target).parent().parent().siblings('.Atext').text()
                $scope.EditAid=$($event.target).parent().parent().siblings('.Aid').text()
                $scope.EditERCode=$($event.target).parent().parent().siblings('.ErCode').text()

            }
            $scope.DeleteAnnoun=function ($event) {
                $scope.DeleteAid=$($event.target).parent().parent().siblings('.Aid').text();
            }
        })
        $(document).ready(function () {
            $("#StartDate").persianDatepicker({
            inline: false,
            format: 'YYYY/MM/D',
            initialValue: true,
            });
            $("#EndDate").persianDatepicker({
                initialValue: true,
                format: 'YYYY/MM/D',
            });
            $("#edit_StartDate").persianDatepicker({
                inline: false,
                format: 'YYYY/MM/D',
                initialValue: true,
            });
            $("#edit_EndDate").persianDatepicker({
                initialValue: true,
                format: 'YYYY/MM/D',
            });
        //Announcement
            document.getElementById('AddAnnouncementForm').addEventListener('submit',function (e) {
                e.preventDefault();
                document.querySelector('#Add-Announcement-Btn').setAttribute('disabled','disabled')
                $('.circle-loader.Add').css('display','block')
                let Form=new FormData(document.getElementById('AddAnnouncementForm'));
                axios.post(this.action,Form)
                    .then((response)=> {
                        // console.log(response.data)
                        window.location.href="{{ route('setting') }}";
                    })
                    .catch((error)=> {
                        const errors =error.response.data.errors;
                        // console.log(errors);
                        const Errormessage=document.querySelectorAll('.text-danger');
                        Errormessage.forEach((element)=>element.textContent='')
                        document.querySelector('#Add-Announcement-Btn').removeAttribute('disabled')
                        $('.circle-loader.Add').css('display','none')
                        // Show Error Message
                        Object.keys(errors).forEach((element)=>{
                            // console.log(element)
                            const Item=document.getElementById(element);
                            const ErrorMessage=Object(errors)[element];
                            Item.insertAdjacentHTML("afterend", `<small class="text-danger">${ErrorMessage}</small>`)
                        })
                    })
            })
            document.getElementById('EditAnnouncementForm').addEventListener('submit',function (e) {
                e.preventDefault();
                document.querySelector('#Edit-Announcement-Btn').setAttribute('disabled','disabled')
                $('.circle-loader.Edit').css('display','block')
                let Form=new FormData(document.getElementById('EditAnnouncementForm'));
                axios.post(this.action,Form)
                    .then((response)=> {
                        // console.log(response.data)
                        window.location.href=response.data;
                    })
                    .catch((error)=> {
                        console.log(error);
                        const errors =error.response.data.errors;
                        const Errormessage=document.querySelectorAll('.text-danger');
                        Errormessage.forEach((element)=>element.textContent='')
                        document.querySelector('#Edit-Announcement-Btn').removeAttribute('disabled')
                        $('.circle-loader.Edit').css('display','none')
                        // Show Error Message
                        Object.keys(errors).forEach((element)=>{
                            // console.log(element)
                            const Item=document.getElementById('edit_'+element);
                            const ErrorMessage=Object(errors)[element];
                            Item.insertAdjacentHTML("afterend", `<small class="text-danger">${ErrorMessage}</small>`)
                        })
                    })
            })
        //Slider
            document.getElementById('AddSlideForm').addEventListener('submit',function (e) {
                e.preventDefault();
                document.querySelector('#Add-Slider-Btn').setAttribute('disabled','disabled')
                $('.circle-loader.Add').css('display','block')
                let Form=new FormData(document.getElementById('AddSlideForm'));
                // console.log(document.getElementById('image').files[0])
                // Form.append('file',document.getElementById('image').files[0])
                // console.log(Form.get('Edate'));
                axios.post(this.action,Form)
                    .then((response)=> {
                        console.log(response.data)
                        window.location.href=response.data;
                    })
                    .catch((error)=> {
                        console.log(error)
                        const errors =error.response.data.errors;
                        console.log(errors);
                        const Errormessage=document.querySelectorAll('.text-danger');
                        Errormessage.forEach((element)=>element.textContent='')
                        document.querySelector('#Add-Slider-Btn').removeAttribute('disabled')
                        $('.circle-loader.Add').css('display','none')
                        // Show Error Message
                        Object.keys(errors).forEach((element)=>{
                            // console.log(element)
                            const Item=document.getElementById(element);
                            const ErrorMessage=Object(errors)[element];
                            Item.insertAdjacentHTML("afterend", `<small class="text-danger">${ErrorMessage}</small>`)
                        })
                    })
            })
            document.getElementById('EditSlideForm').addEventListener('submit',function (e) {
                e.preventDefault();
                document.querySelector('#Edit-Slider-Btn').setAttribute('disabled','disabled')
                $('.circle-loader.Edit').css('display','block')
                let Form=new FormData(document.getElementById('EditSlideForm'));
                // console.log(document.getElementById('image').files[0])
                // Form.append('file',document.getElementById('image').files[0])
                // console.log(Form.get('Edate'));
                axios.post(this.action,Form)
                    .then((response)=> {
                        console.log(response.data)
                        window.location.href=response.data;
                    })
                    .catch((error)=> {
                        console.log(error)
                        const errors =error.response.data.errors;
                        console.log(errors);
                        const Errormessage=document.querySelectorAll('.text-danger');
                        Errormessage.forEach((element)=>element.textContent='')
                        document.querySelector('#Edit-Slider-Btn').removeAttribute('disabled')
                        $('.circle-loader.Edit').css('display','none')
                        // Show Error Message
                        Object.keys(errors).forEach((element)=>{
                            // console.log(element)
                            const Item=document.getElementById('edit_' + element);
                            const ErrorMessage=Object(errors)[element];
                            Item.insertAdjacentHTML("afterend", `<small class="text-danger">${ErrorMessage}</small>`)
                        })
                    })
            })
        })
    </script>
@endsection
