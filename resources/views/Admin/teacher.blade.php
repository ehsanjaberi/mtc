@extends('layouts.admin-app')
@section('title')
    اساتید
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    اساتید
                    <!-- <small>توضیحات</small> -->
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
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Add-Teacher">افزودن استاد</a>
{{--                                    @endif--}}
{{--                                @endfor--}}
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding" id="datatabel">
                                <table class="table table-hover" style="white-space: nowrap">
                                    <tr>
                                        <th>کد پرسنلی</th>
                                        <th>نام</th>
                                        <th>آخرین مدرک تحصیلی</th>
                                        <th>رشته تحصیلی</th>
                                        <th>تلفن ثابت</th>
                                        <th>تلفن همراه</th>
                                        <th>پست الکترونیک</th>
                                        <th>آدرس</th>
                                        <th>وضعیت</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                        @forelse($Teacher as $teacher)
                                            <tr>
                                                <td class="CodePrsn">{{ $teacher->CodePrsn }}</td>
                                                <td class="Fname">{{ $teacher->User->Fname.' '.$teacher->User->Lname }}</td>
                                                <td class="CodeNational">{{ $teacher->CodeRank }}</td>
                                                <td class="username">{{ $teacher->BrcName }}</td>
                                                <td class="username">{{ $teacher->Telephone }}</td>
                                                <td class="username">{{ $teacher->PhoneNumber }}</td>
                                                <td class="username">{{ $teacher->Email }}</td>
                                                <td class="username">{{ $teacher->Address }}</td>
                                                <td class="username">{{ $teacher->Status }}</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" class="EditUser" data-target="#Edit-Teacher" onclick="EditTeacher({{ $teacher->CodePrsn }})"><span class="label label-success">ویرایش</span></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center bg-gray-light">سطری پیدا نشد</td>
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
        <div class="modal fade" id="Add-Teacher">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">افزودن استاد</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('Addteacher') }}" method="post" id="AddTeacherForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6" style="position:relative;">
                                    <div class="form-group">
                                        <label for="CodePersonal">کدپرسنلی</label>
                                        <input type="text" class="form-control" id="Search_CodePrsn" name="CodePrsn" placeholder="کدپرسنلی" autocomplete="off">
                                        <div class="UserList" style="position:absolute; margin: 0!important;">

                                        </div>
                                    </div>
                                </div>
                                <!--              Fname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Fname">نام</label>
                                        <input type="text" class="form-control" id="AddFname" placeholder="نام" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--              Lname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Lname">نام خانوادگی</label>
                                        <input type="text" class="form-control" id="AddLname"  placeholder="نام خانوادگی" readonly>
                                    </div>
                                </div>
                                <!--              CodeNational-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CodeNational">کد ملی</label>
                                        <input class="form-control" id="CodeNational"  placeholder="کدملی" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">آخرین مدرک تحصیلی</label>
                                        <select name="Rank" id="Rank" class="form-control">
                                            <option value="1">کارردانی</option>
                                            <option value="2">کارشناسی</option>
                                            <option value="3">کارشناسی ارشد</option>
                                            <option value="4">دکتری</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="branch">رشته تحصیلی</label>
                                        <input type="text" class="form-control" id="branch" name="Branch" placeholder="مدرک تحصیلی"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">تلفن ثابت</label>
                                        <input type="text" class="form-control" placeholder="تلفن ثابت" id="telephone" name="Telephone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phonenumber">تلفن همراه</label>
                                        <input type="text" class="form-control" id="phonenumber" name="Phonenumber" placeholder="تلفن همراه"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">ایمیل</label>
                                        <input type="text" class="form-control" placeholder="ایمیل" id="email" name="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">آدرس</label>
                                        <input type="text" class="form-control" id="address" name="Address" placeholder="آدرس"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">استاد پروژه</label>
                                        <input type="checkbox"  id="status" value="1" name="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left" id="Add-User-Btn">افزودن</button>
                            <div class="circle-loader Add"></div>
                            <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="Edit-Teacher">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">ویرایش کاربر</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('editteacher') }}" method="post" id="EditTeacherForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6" style="position:relative;">
                                    <div class="form-group">
                                        <label for="CodePersonal">کدپرسنلی</label>
                                        <input type="text"id="edit_OldCodePrsn" name="OldCodePrsn" hidden>
                                        <input type="text" class="form-control" id="edit_Search_CodePrsn" name="CodePrsn" placeholder="کدپرسنلی" autocomplete="off" readonly>
{{--                                        <div class="edit_UserList" style="position:absolute; margin: 0!important;">--}}

{{--                                        </div>--}}
                                    </div>
                                </div>
                                <!--              Fname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Fname">نام</label>
                                        <input type="text" class="form-control" id="edit_Fname" placeholder="نام" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--              Lname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Lname">نام خانوادگی</label>
                                        <input type="text" class="form-control" id="edit_Lname"  placeholder="نام خانوادگی" readonly>
                                    </div>
                                </div>
                                <!--              CodeNational-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CodeNational">کد ملی</label>
                                        <input class="form-control" id="edit_CodeNational"  placeholder="کدملی" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_Rank">آخرین مدرک تحصیلی</label>
                                        <select name="Rank" id="edit_Rank" class="form-control">
                                            <option value="1">کارردانی</option>
                                            <option value="2">کارشناسی</option>
                                            <option value="3">کارشناسی ارشد</option>
                                            <option value="4">دکتری</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_branch">رشته تحصیلی</label>
                                        <input type="text" class="form-control" id="edit_branch" name="Branch" placeholder="مدرک تحصیلی"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_telephone">تلفن ثابت</label>
                                        <input type="text" class="form-control" placeholder="تلفن ثابت" id="edit_telephone" name="Telephone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_phonenumber">تلفن همراه</label>
                                        <input type="text" class="form-control" id="edit_phonenumber" name="Phonenumber" placeholder="تلفن همراه"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">ایمیل</label>
                                        <input type="edit_text" class="form-control" placeholder="ایمیل" id="edit_email" name="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_address">آدرس</label>
                                        <input type="text" class="form-control" id="edit_address" name="Address" placeholder="آدرس"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_status">استاد پروژه</label>
                                        <input type="checkbox"  id="edit_status" value="1" name="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left" id="Edit-User-Btn">ویرایش</button>
                            <div class="circle-loader Edit"></div>
                            <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
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
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validation/localization/messages_fa.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let User;
            //Search
            $('#Search_CodePrsn').keyup(function () {
                axios.get('/Admin/teacher/autocpmplete/Add/'+$(this).val())
                    .then((response)=>{$(".UserList").fadeIn();
                        $(".UserList").html(response.data.Output);
                        User=response.data.User;
                    })
                    .catch((error)=>{
                        console.log(error)
                    })
            });
            $(document).on('click','#AddTeacher li',function () {
                let Code=$(this).text();
                User.forEach(function (user) {
                    if (Code == user.CodePrsn)
                    {
                        document.getElementById('AddFname').value=user.Fname;
                        document.getElementById('AddLname').value=user.Lname;
                        document.getElementById('CodeNational').value=user.CodeNational;
                    }
                })
                $('#Search_CodePrsn').val(Code)
                $(".UserList").fadeOut();
            });
            $('#AddTeacherForm').validate({
                rules:{
                    CodePrsn:{
                        required:true
                    },
                    Rank:{
                        required:true
                    },
                    Branch:{
                        required:true
                    },
                    Telephone:{
                        required:true
                    },
                    Phonenumber:{
                        required:true
                    },
                    Email:{
                        required:true
                    },

                    Address:{
                        required:true
                    },
                }
            })
            $('#EditTeacherForm').validate({
                rules:{
                    CodePrsn:{
                        required:true
                    },
                    Rank:{
                        required:true
                    },
                    Branch:{
                        required:true
                    },
                    Telephone:{
                        required:true
                    },
                    Phonenumber:{
                        required:true
                    },
                    Email:{
                        required:true
                    },

                    Address:{
                        required:true
                    },
                }
            })
            // $('#edit_Search_CodePrsn').keyup(function () {
            //     axios.get('/Admin/teacher/autocpmplete/Edit/'+$(this).val())
            //         .then((response)=>{$(".editUserList").fadeIn();
            //             $(".edit_UserList").html(response.data.Output);
            //             User=response.data.User;
            //         })
            //         .catch((error)=>{
            //             console.log(error)
            //         })
            // });
            // $(document).on('click','#EditTeacher li',function () {
            //     let Code=$(this).text();
            //     User.forEach(function (user) {
            //         if (Code == user.CodePrsn)
            //         {
            //             document.getElementById('edit_Fname').value=user.Fname;
            //             document.getElementById('edit_Lname').value=user.Lname;
            //             document.getElementById('edit_CodeNational').value=user.CodeNational;
            //         }
            //     })
            //     $('#edit_Search_CodePrsn').val(Code)
            //     $(".edit_UserList").fadeOut();
            // });
        });
        function EditTeacher(Code) {
            axios.get('/Admin/teacher/GetInformation/' + Code)
                .then(function (response) {
                    console.log(response.data.user)
                    document.getElementById('edit_OldCodePrsn').value = response.data.CodePrsn;
                    document.getElementById('edit_Search_CodePrsn').value = response.data.CodePrsn;
                    document.getElementById('edit_Fname').value = response.data.user.Fname;
                    document.getElementById('edit_Lname').value = response.data.user.Lname;
                    document.getElementById('edit_CodeNational').value = response.data.user.CodeNational;
                    document.getElementById('edit_Rank').value=response.data.CodeRank;
                    document.getElementById('edit_branch').value=response.data.BrcName;
                    document.getElementById('edit_telephone').value=response.data.Telephone;
                    document.getElementById('edit_phonenumber').value=response.data.PhoneNumber;
                    document.getElementById('edit_email').value=response.data.Email;
                    document.getElementById('edit_address').value=response.data.Address;
                    if (response.data.Status == 1)
                    {
                        document.getElementById('edit_status').checked = true;
                    }
                    else {
                        document.getElementById('edit_status').checked = false;
                    }
                })
        }
    </script>
@endsection
