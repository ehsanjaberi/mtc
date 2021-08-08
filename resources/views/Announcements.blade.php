@extends('layouts.guest')
@section('title')
    اخبار و اطلاعیه ها
@endsection
@section('content')
    <section class="bg-gray-light mt-10 rounded-section"  >
        <div class="container-fluid">
            <div class="row" style="display: flex;justify-content: center;margin-bottom: 20px;padding-top: 30px;">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center">
                        <h3>اخبار و اطلاعیه ها</h3>
                        <p class="text">
                            بروزترین اخبار انستیتو کامپیوتر را در اینجا مشاهده کنید.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-lg-12 col-md-12">
                    <div class="box">
                            <div class="box-header bg-info">
                                <h3 class="box-title">اطلاعیه ها</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding notifications">
                                <table class="table table-striped">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>عنوان</th>
                                        <th>متن اطلاعیه</th>
                                        <th class="text-center" style="width: 40px">دانلود</th>
                                    </tr>
                                    @foreach($Announcement as $Announ)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{ $Announ->title }}</td>
                                            <td>{{ $Announ->text }}</td>
                                            <td class="text-center text-green">
                                                @if($Announ->attachment)
                                                    <a href="{{route('Download',['announ',$Announ->id])}}">
                                                        <span class="fa fa-download"></span>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                {{ $Announcement->links() }}
                            </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
