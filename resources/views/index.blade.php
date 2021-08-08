@extends('layouts.guest')
@section('title')
    صفحه اصلی
@endsection
@section('content')
    <div>
    <section class="home-section">
        <div class="container">
            <div class="row" style="" id="Home">
                <div class="col-md-10 col-sm-8" style="width:100%;">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators" style="bottom: -11px">
                            @foreach($Slider as $Slide)
                                @if($loop->first)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="active"></li>
                                @else
                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($Slider as $Slide)
                                @if($loop->first)
                                    <div class="item active">
                                @else
                                    <div class="item">
                                @endif
                                    <img src="{{ asset('storage/'.$Slide->image_url) }}" class="img-slider">
                                </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact-us" class="contact-us bg-gray">
        <div class="row" style="display: flex;justify-content: center;margin-bottom: 10px;padding-top: 50px;">
            <div class="col-lg-6 col-md-6">
                <div class="section-title text-center">
                    <h3>پیام بگذارید</h3>
                    <p class="text">
                        انتقادات و پیشنهادات خود را با ما در میان بگذارید.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="display: flex;justify-content: center">
                <div class="col-md-6">
                    <form action="{{ route('AddContact') }}" method="post" id="ContactForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">نام</label>
                                    <input type="text" name="name" id="name" class="form-control contact-us">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email">شماره همراه</label>
                                    <input type="text" name="phonenumber" id="phonenumber" class="form-control contact-us">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="message">متن پیام</label>
                                    <textarea name="text" id="text" cols="30" rows="10" style="height:150px" class="form-control contact-us"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-left">
                                <div class="form-group">
                                    @if(session('success'))
                                        <small class="text-green">پیام شما ارسال شد.</small>
                                    @endif
                                    <button type="submit" class="custom-btn">ارسال پیام</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/validation/localization/messages_fa.min.js') }}"></script>
    <script>
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
        })
    </script>
@endsection
