@extends('layouts.guest')
@section('title')
    لینک کلاس ها
@endsection
@section('content')
    <section class="bg-gray-light mt-10 rounded-section"  >
        <div class="container-fluid">
            <div class="row" style="display: flex;justify-content: center;margin-bottom: 20px;padding-top: 30px;">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center">
                        <h3>زمان برگزاری کلاس ها</h3>
                        <p class="text">
                            لینک کلاس های رشته کامپیوتر
                        </p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-tools" style="position:static;float: left;">
                                <form action="{{ route('classlinkssearch') }}" method="post">
                                    @csrf
                                    <div class="input-group input-group-sm" style="width: 160px;">
                                        <input type="text" name="id" id="Search_CodePrn" class="form-control pull-right" placeholder="جستجو(نام درس)" autocomplete="off">
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
                        <div class="box-body table-responsive no-padding notifications">
                            <table class="table table-striped">
                                <tr class="bg-gray">
                                    <th style="width: 10px">#</th>
                                    <th>کد درس</th>
                                    <th>عنوان درس</th>
                                    <th>زمان برگزرای</th>
                                    <th>لینک کلاس</th>
                                    <th>لینک اطلاعیه</th>
                                </tr>
                                @foreach($Class as $class)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $class->LessonCode }}</td>
                                        <td>{{ $class->LessonTitle }}</td>
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
                                            @foreach($Announ as $announ)
                                                @if($announ->ClassLink ==$class->ERCode)
                                                    <a href="#" onclick="Showmodal({{ $announ }})" data-toggle="modal" data-target="#Show-Announ">لینک اطلاعیه</a>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            {{ $Class->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Show-Announ">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex">
                        <h4 class="modal-title" style="margin-left: auto">مشاهده اطلاعیه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <span>عنوان اطلاعیه</span>
                                <p id="title"></p>
                            </div>
                            <div class="col-md-12">
                                <span>متن اطلاعیه</span>
                                <p id="text"></p>
                            </div>
                            <div class="col-md-12">
                                <span>فایل پیوست</span>
                                <p id="attachment"></p>
                            </div>
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validation/localization/messages_fa.min.js') }}"></script>
    <script>
        function Showmodal(announ)
        {
            $('#title').text(Object.values(announ)[1]);
            $('#text').text(Object.values(announ)[2]);
            if(Object.values(announ)[3])
            {
                document.getElementById('attachment').innerHTML=`<a href="/Download/download/announ/${Object.values(announ)[0]}">دانلود</a>`;
            }
            else{
                document.getElementById('attachment').innerHTML=`<span class="text-red">فایل پیوست ندارد</span> `;
            }

            // alert(Object.values(announ)[0]);
        }
        $(document).ready(function () {
            $('#ContactForm').validate({
                rules:{
                    name:{
                        required:true
                    },
                    phonenumber:{
                        required:true
                    },
                    text:{
                        required:true
                    }
                }
            })
            $('#Search_CodePrn').keyup(function () {
                axios.get('/classlist/searchclass/'+$(this).val())
                    .then((response)=>{

                        $(".UserList").fadeIn();
                        $(".UserList").html(response.data.Output);
                    })
                    .catch((error)=>{
                        console.log(error.data)
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
