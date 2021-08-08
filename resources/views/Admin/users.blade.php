@extends('layouts.admin-app')
@section('title')
    کاربران
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div ng-app="Users" ng-controller="UsersController">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    کاربران
                    <!-- <small>توضیحات</small> -->
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                    @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 101)
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Add-User">افزودن کاربر</a>
                                    @endif
                                @endfor
                                <div class="box-tools" style="top: 10px;position:static;float: left;">
                                    <form action="{{ route('user') }}" method="post">
                                        @csrf
                                    <div class="input-group input-group-sm" style="width: 160px;">
                                        <input type="text" name="CodePrsn" id="Search_CodePrn" class="form-control pull-right" placeholder="جستجو" autocomplete="off">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="UserList" style="position:absolute;">

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding" id="datatabel">
                                <table class="table table-hover">
                                    <tr>
                                        <th>کد پرسنلی</th>
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>کد ملی</th>
                                        <th>نام کاربری</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>تاریخ ویرایش</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                    @if($Users)
                                        @forelse($Users as $User)
                                            <tr>
                                                <td class="CodePrsn">{{ $User->CodePrsn }}</td>
                                                <td class="Fname">{{ $User->Fname }}</td>
                                                <td class="Lname">{{ $User->Lname }}</td>
                                                <td class="CodeNational">{{ $User->CodeNational }}</td>
                                                <td class="username">{{ $User->username }}</td>
                                                <td>{{ str_replace('-','/',\Morilog\Jalali\Jalalian::forge($User->created_at))  }}</td>
                                                <td>{{ $User->created_at == $User->updated_at?' ویرایش نشده':str_replace('-','/',\Morilog\Jalali\Jalalian::forge($User->updated_at)) }}</td>
                                                <td>
                                                    @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                        @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 103)
                                                            <a href="#" data-toggle="modal" class="DeleteUser" data-target="#Delete-User"><span class="label label-danger">حذف</span></a>
                                                        @endif
                                                    @endfor
                                                    @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                        @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 102)
                                                                <a href="#" data-toggle="modal" class="EditUser" data-target="#Edit-User"><span class="label label-success">ویرایش</span></a>
                                                        @endif
                                                    @endfor
                                                    @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                        @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 104)
                                                                <a ng-click="AccessLevelCode($event)" href="#" data-toggle="modal" class="AccessLevelUser" data-target="#AccessLevel-User"><span class="label label-primary">سطح دسترسی</span></a>
                                                        @endif
                                                    @endfor
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center bg-gray-light">سطری پیدا نشد</td>
                                            </tr>
                                        @endforelse
                                    @else
                                        <tr><td colspan="8" class="text-center bg-gray-light">سطری یافت نشد</td></tr>
                                    @endif
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <!-- pagination -->
                        <div class="text-center">
                           {{ $Users->links() }}
                        </div>
                        <!-- /.pagination -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div class="modal modal-danger fade" id="Delete-User">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex;">
                        <h4 class="modal-title" style="margin-left: auto">حذف کاربر</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>آیا میخواهید کاربر را حذف کنید!</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('DeleteUser') }}" method="post">
                            @csrf
                            <input type="text" id="Delete_id" name="id" hidden>
                             <button class="btn btn-outline pull-left">حذف</button>
                            <button type="reset" class="btn btn-outline pull-right" data-dismiss="modal">انصراف</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="Add-User">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">افزودن کاربر</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('register') }}" method="post" id="AddUserForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!--              CodePrsn-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CodePersonal">کدپرسنلی</label>
                                        <input type="text" class="form-control" id="CodePrsn" name="CodePrsn" placeholder="کدپرسنلی">
                                    </div>
                                </div>
                                <!--              Fname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Fname">نام</label>
                                        <input type="text" class="form-control" id="Fname" name="Fname" placeholder="نام">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--              Lname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Lname">نام خانوادگی</label>
                                        <input type="text" class="form-control" id="Lname" name="Lname" placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <!--              CodeNational-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CodeNational">کد ملی</label>
                                        <input class="form-control" id="CodeNational" name="CodeNational" placeholder="کدملی"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--              username-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">نام کاربری</label>
                                        <input class="form-control" id="username" name="username" placeholder="نام کاربری"/>
                                    </div>
                                </div>
    {{--                            password--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">رمز عبور</label>
                                        <input class="form-control" id="password" name="password" placeholder="رمز عبور"/>
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
        <div class="modal fade" id="Edit-User">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">ویرایش کاربر</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('EditUser') }}" method="post" id="EditUserForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!--              CodePrsn-->
                                <input type="text" id="edit_OldCodePrsn" name="OldCodePrsn" hidden>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CodePersonal">کدپرسنلی</label>
                                        <input type="text" class="form-control" id="edit_CodePrsn" name="CodePrsn" placeholder="کدپرسنلی">
                                    </div>
                                </div>
                                <!--              Fname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Fname">نام</label>
                                        <input type="text" class="form-control" id="edit_Fname" name="Fname" placeholder="نام">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--              Lname-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Lname">نام خانوادگی</label>
                                        <input type="text" class="form-control" id="edit_Lname" name="Lname" placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <!--              CodeNational-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CodeNational">کد ملی</label>
                                        <input class="form-control" id="edit_CodeNational" name="CodeNational" placeholder="کدملی"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--              username-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">نام کاربری</label>
                                        <input class="form-control" id="edit_username" name="username" placeholder="نام کاربری"/>
                                    </div>
                                </div>
                                {{--                            password--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">رمز عبور</label>
                                        <input class="form-control" id="edit_password" name="password" placeholder="رمز عبور"/>
                                        <small>*اگر رمز عبور جدید را وارد نکنید رمز عبور قبلی اعمال می شود.</small>
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
        <div class="modal fade" id="AccessLevel-User">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="display: flex">
                    <h4 class="modal-title" style="margin-left: auto">سطح دسترسی کاربر</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Roles')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div style="display: flex;border-bottom: 1px dashed;padding: 15px 0 15px 15px">
                            <input type="text" name="RoleUserId" id="RoleUserId" ng-model="RoleUserId" hidden>
                        </div>
                        <div class="form-group" style="margin-top: 5px">
                            <label for="">سطح دسترسی کاربر</label>
                            <div class="userdetials" style="margin: 8px" id="userdetials"></div>
                            <select name="UAL" id="UAL" class="form-control" style="height: 36px;">
                                <option value="0">بدون سطح دسترسی</option>
                                <option ng-repeat="name in names" value="@{{ name.id }}">@{{ name.Name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">انصراف</button>
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
        var User=angular.module('Users',[]);
        User.controller('UsersController',function ($scope) {
            $scope.AccessLevelCode=function($event){
                $scope.names=null;
                let CodePrsn=$($event.target).parent().parent().siblings('.CodePrsn').text();
                $scope.RoleUserId=CodePrsn;
                // $scope.UserRoles=1;
                axios.post("{{ route('GetInformation') }}",{
                    'CodePrsn':CodePrsn,
                })
                .then((response)=>{
                    console.log(response.data)
                    $scope.names=response.data.roles;
                    for (let i=0;i<response.data.roles.length;i++)
                    {
                        if (response.data.user.CodeAccess == response.data.roles[i].id)
                        {
                            document.getElementById('userdetials').innerText='سطح دسترسی فعلی:'+response.data.roles[i].Name
                        }
                    }
                    $scope.$apply()
                })
                .catch((error)=>{
                    console.log(error)
                })
            };
        })

        $(document).ready(function () {
            $('.EditUser').click(function () {
                let field=['CodePrsn','Fname','Lname','CodeNational','username'];
                const Errormessage=document.querySelectorAll('.text-danger');
                Errormessage.forEach((element)=>element.textContent='')
                document.querySelector('#Edit-User-Btn').removeAttribute('disabled')
                $('.circle-loader.Edit').css('display','none')
                for (var i=0;i<field.length;i++)
                {
                    document.getElementById('edit_' + field[i]).value=$(this).parent().siblings('.' +field[i]).text();
                }
                document.getElementById('edit_OldCodePrsn').value=$(this).parent().siblings('.CodePrsn').text();
            })
            $('.DeleteUser').click(function () {
                document.getElementById('Delete_id').value=$(this).parent().siblings('.CodePrsn').text();
            });
            $('.AccessLevelUser').click(function () {

            });
            document.getElementById('EditUserForm').addEventListener('submit',function (e) {
                e.preventDefault();
                document.querySelector('#Edit-User-Btn').setAttribute('disabled','disabled')
                $('.circle-loader.Edit').css('display','block')
                let Form=new FormData(document.getElementById('EditUserForm'));
                axios.post(this.action,{
                    'OldCodePrsn':Form.get('OldCodePrsn'),
                    'CodePrsn':Form.get('CodePrsn'),
                    'Fname':Form.get('Fname'),
                    'Lname':Form.get('Lname'),
                    'CodeNational':Form.get('CodeNational'),
                    'username':Form.get('username'),
                    'password':Form.get('password')
                })
                .then((response)=> {
                    console.log(response.data)
                    window.location.href=response.data;
                })
                .catch((error)=> {
                    // console.log(response.data);
                    const errors =error.response.data.errors;
                    const Errormessage=document.querySelectorAll('.text-danger');
                    Errormessage.forEach((element)=>element.textContent='')
                    document.querySelector('#Edit-User-Btn').removeAttribute('disabled')
                    $('.circle-loader.Edit').css('display','none')
                    // Show Error Message
                    Object.keys(errors).forEach((element)=>{
                        const Item=document.getElementById('edit_' + element);
                        const ErrorMessage=Object(errors)[element];
                        Item.insertAdjacentHTML("afterend", `<small class="text-danger">${ErrorMessage}</small>`)
                        // Item.classList.add('is-invalid')
                    })
                })
            })
            // Ok
            document.getElementById('AddUserForm').addEventListener('submit',function (e) {
                e.preventDefault();
                document.querySelector('#Add-User-Btn').setAttribute('disabled','disabled')
                $('.circle-loader.Add').css('display','block')
                let Form=new FormData(document.getElementById('AddUserForm'));
                axios.post(this.action,{
                    'CodePrsn':Form.get('CodePrsn'),
                    'Fname':Form.get('Fname'),
                    'Lname':Form.get('Lname'),
                    'CodeNational':Form.get('CodeNational'),
                    'username':Form.get('username'),
                    'password':Form.get('password')
                })
                    .then((response)=> {
                        console.log(response.data)
                        window.location.href="{{ route('users') }}";
                    })
                    .catch((error)=> {
                        const errors =error.response.data.errors;
                        console.log(errors);
                        const Errormessage=document.querySelectorAll('.text-danger');
                        Errormessage.forEach((element)=>element.textContent='')
                        document.querySelector('#Add-User-Btn').removeAttribute('disabled')
                        $('.circle-loader.Add').css('display','none')
                        // Show Error Message
                        Object.keys(errors).forEach((element)=>{
                            console.log(element)
                            const Item=document.getElementById(element);
                            const ErrorMessage=Object(errors)[element];
                            Item.insertAdjacentHTML("afterend", `<small class="text-danger">${ErrorMessage}</small>`)
                        })
                    })
            })
            //Search
            $('#Search_CodePrn').keyup(function () {
                axios.get('/Admin/users/autocpmplete/'+$(this).val())
                .then((response)=>{$(".UserList").fadeIn();
                    $(".UserList").html(response.data.Output);
                })
                .catch((error)=>{
                    console.log(error)
                })
            });
            $(document).on('click','li',function () {
                console.log($(this).text())
                $('#Search_CodePrn').val($(this).text())
                $(".UserList").fadeOut();
            })
        })
    </script>
@endsection
