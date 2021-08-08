@extends('layouts.guest')
@section('title')
    صفحه اصلی
@endsection
@section('content')
    <section id="weekly-schedule" class="bg-gray-light mt-10 rounded-section">
        <div class="row" style="display: flex;justify-content: center;margin-bottom: 20px;padding-top: 30px;">
            <div class="col-lg-6 col-md-6">
                <div class="section-title text-center">
                    <h3>برنامه هفتگی</h3>
                    <p class="text">
                        شما در اینجا می توانید برنامه هفتگی را مشاهده و دانلود  کنید.
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center" style="padding: 10px 10px">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">کاردانی</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>نیمسال</th>
                                <th>عنوان</th>
                                <th style="width: 40px" class="text-center">مشاهده</th>
                                <th style="width: 40px" class="text-center">دانلود</th>
                            </tr>
                            @forelse($Wkardani as $kardani)
                                    <tr class="text-right">
                                        <td>{{ $loop->index+1  }}</td>
                                        <td>{{ $kardani->Term->NameTrm }}</td>
                                        <td>{{ $kardani->title }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('View',['week',$kardani->id]) }}">
                                                <span class="fa fa-eye text-blue"></span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('Download',['week',$kardani->id]) }}">
                                                <span class="fa fa-download text-green"></span>
                                            </a>
                                        </td>
                                    </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center bg-gray-light" style="">
                                        سطری یافت نشد
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer chart-pagination">
                        {{ $Wkardani->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">کارشناسی</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>نیمسال</th>
                                <th>عنوان</th>
                                <th style="width: 40px" class="text-center">مشاهده</th>
                                <th style="width: 40px">دانلود</th>
                            </tr>
                            @forelse($Wkarshenasi as $karshenasi)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $karshenasi->Term->NameTrm }}</td>
                                <td>{{ $karshenasi->title }}</td>
                                <td>
                                    <a href="{{ route('View',['week',$karshenasi->id]) }}">
                                        <span class="fa fa-eye text-blue"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('Download',['week',$karshenasi->id]) }}">
                                        <span class="fa fa-download text-green"></span>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center bg-gray-light" style="">
                                        سطری یافت نشد
                                    </td>
                                </tr>
                            @endforelse

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer chart-pagination">
                        {{ $Wkarshenasi->links() }}
{{--                        {{ $Karshenasi->links() }}--}}

{{--                        <ul class="pagination pagination-sm no-margin pull-right">--}}
{{--                            <li><a href="#">&laquo;</a></li>--}}
{{--                            <li><a href="#">1</a></li>--}}
{{--                            <li><a href="#">2</a></li>--}}
{{--                            <li><a href="#">3</a></li>--}}
{{--                            <li><a href="#">&raquo;</a></li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="row" style="display: flex;justify-content: center;margin-bottom: 20px;padding-top: 30px;">
            <div class="col-lg-6 col-md-6">
                <div class="section-title text-center">
                    <h3>چارت تحصیلی</h3>
                    <p class="text">
                        شما در اینجا می توانید چارت تحصیلی را مشاهده و دانلود  کنید.
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center" style="padding: 10px 10px">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">کاردانی</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>نیمسال</th>
                                <th>عنوان</th>
                                <th style="width: 40px" class="text-center">مشاهده</th>
                                <th style="width: 40px" class="text-center">دانلود</th>
                            </tr>
                            @forelse($Ckardani as $kardani)
                                <tr class="text-right">
                                    <td>{{ $loop->index+1  }}</td>
                                    <td>{{ $kardani->Term->NameTrm }}</td>
                                    <td>{{ $kardani->title }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('View',['week',$kardani->id]) }}">
                                            <span class="fa fa-eye text-blue"></span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('Download',['week',$kardani->id]) }}">
                                            <span class="fa fa-download text-green"></span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center bg-gray-light" style="">
                                        سطری یافت نشد
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer chart-pagination">
                        {{ $Ckardani->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">کارشناسی</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>نیمسال</th>
                                <th>عنوان</th>
                                <th style="width: 40px" class="text-center">مشاهده</th>
                                <th style="width: 40px">دانلود</th>
                            </tr>
                            @forelse($Ckarshenasi as $karshenasi)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $karshenasi->Term->NameTrm }}</td>
                                    <td>{{ $karshenasi->title }}</td>
                                    <td>
                                        <a href="{{ route('View',['week',$karshenasi->id]) }}">
                                            <span class="fa fa-eye text-blue"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('Download',['week',$karshenasi->id]) }}">
                                            <span class="fa fa-download text-green"></span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center bg-gray-light" style="">
                                        سطری یافت نشد
                                    </td>
                                </tr>
                            @endforelse

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer chart-pagination">
                        {{ $Ckarshenasi->links() }}

                        {{--                        <ul class="pagination pagination-sm no-margin pull-right">--}}
                        {{--                            <li><a href="#">&laquo;</a></li>--}}
                        {{--                            <li><a href="#">1</a></li>--}}
                        {{--                            <li><a href="#">2</a></li>--}}
                        {{--                            <li><a href="#">3</a></li>--}}
                        {{--                            <li><a href="#">&raquo;</a></li>--}}
                        {{--                        </ul>--}}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
