@extends('layouts.admin-app')
@section('title')
    سطوح دسترسی
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div  ng-app="AccessLevel" ng-controller="Controller">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    سطوح دسترسی
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>سطوح دسترسی</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @if($UserAccessLevel)
                                        @foreach($UserAccessLevel as $UAL)
                                            <tr>
                                                <td class="id">{{$UAL->id}}</td>
                                                <td class="name">{{$UAL->Name}}</td>
                                                <td>
                                                    <ul>
                                                        @if($UAL->access_level_id)
                                                            @foreach($UAL->access_level_id as $ALid)
                                                                @foreach($AccessLevels as $AL)
                                                                    @if($AL->id == $ALid)
                                                                    <li>{{ $AL->name }}=>{{ $AL->id }}</li>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @else
                                                            <li>سطح دسترسی تعریف نشده</li>
                                                        @endif
                                                    </ul>
                                                </td>
                                                <td class="">
                                                    @for($i=0;$i<strlen(\Auth::user()->Role->access_level_id);$i+=3)
                                                        @if(\Auth::user()->Role->access_level_id[$i].\Auth::user()->Role->access_level_id[$i+1].\Auth::user()->Role->access_level_id[$i+2] == 107)
                                                            <a ng-click="Edit($event)" onclick="Edit({{ $UAL }},{{ $AccessLevels }})" class="EditAccessLevel"  href="#Edit" data-toggle="tab"><span class="label label-success">ویرایش</span></a>
                                                            <a ng-click="Exit($event)" class="ExitEditAccessLevel" style="display: none"  href="#Add" data-toggle="tab"><span class="label label-danger">انصراف</span></a>
                                                        @endif
                                                    @endfor
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="4" class="bg-gray-light" style="text-align: center;">سطری یافت نشد!</td></tr>
                                    @endif
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-4">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#Add" class="Addtab" data-toggle="tab">افزودن</a></li>
                                <li class="active"  style="display: none"><a href="#Edit" data-toggle="tab" class="Edittab">ویرایش</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="Add">
                                    <form action="{{ route('AccessLevelStore') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Name">نام</label>
                                            <input type="text" class="form-control" ng-model="Add" id="Name" name="name" placeholder="نام">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <ul class="list-unstyled" style="max-height: 250px;overflow-y: auto">
                                            @foreach($AccessLevels as $AL)
                                           <li>
                                               <input type="checkbox" id="AL{{ $AL->id }}" value="{{ $AL->id }}" name="AL[]">
                                               <label for="AL{{ $AL->id }}">{{ $AL->name }}</label>
                                           </li>
                                            @endforeach
                                        </ul>
                                        <div class="form-group text-left">
                                            <button type="submit" class="btn btn-primary" ng-disabled="!Add" >افزودن</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="Edit">
                                    <form action="{{ route('AccessLevelEdit') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" ng-model="EditId" name="id" id="Edit_id" hidden>
                                            <label for="EditName">نام</label>
                                            <input type="text" ng-model="EditName" class="form-control" id="Edit_name" name="EditName" placeholder="نام">
                                            @error('EditName')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <ul class="list-unstyled" id="EditAccessLevel" style="max-height: 250px;overflow-y: auto">

                                        </ul>
                                        <div class="form-group text-left">
                                            <button type="submit" class="btn btn-success" ng-disabled="!EditName">ویرایش</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
@section('script')
    <script>
       var AccessLevel=angular.module('AccessLevel',[]);
       AccessLevel.controller('Controller',function ($scope) {
           $scope.Edit=function($event){
               $('.nav-tabs').children().css('display','none')
               $($('.nav-tabs').children()[1]).css('display','block')
               $('.ExitEditAccessLevel').css('display','none')
               $('.EditAccessLevel').css('display','initial')
               $scope.EditName= $($event.target).parent().parent().siblings('.name').text();
               $scope.EditId= $($event.target).parent().parent().siblings('.id').text();
               $($event.target).parent().siblings('.ExitEditAccessLevel').css('display','initial')
               $($event.target).parent().css('display','none')
           };
           $scope.Exit=function($event){
               $('.nav-tabs').children().css('display','block')
               $($('.nav-tabs').children()[1]).css('display','none')
               $($event.target).parent().siblings('.EditAccessLevel').css('display','initial')
               $($event.target).parent().css('display','none')
           };
       })
       function Edit(UAL,AL) {
           document.getElementById('Edit_id').value='ehsan'
           let li='';
           for(let i=0;i<AL.length;i++)
           {
               let status=true;
               if(Object.values(UAL)[2]) {
                   for (let j = 0; j < Object.values(UAL)[2].length; j++) {
                       if (Object.values(UAL)[2][j] == Object.values(AL)[i].id) {
                           li += `<li>
                    <input type="checkbox" id="EAL${Object.values(AL)[i].id}" value="${Object.values(AL)[i].id}" name="AL[]"checked>
                    <label for="EAL${Object.values(AL)[i].id}">${Object.values(AL)[i].name}</label>
                    </li>`
                           status = false;
                           break
                       }
                   }
               }
               if (status)
               {
                   li+=`<li>
                    <input type="checkbox" id="EAL${Object.values(AL)[i].id}" value="${Object.values(AL)[i].id}" name="AL[]">
                    <label for="EAL${Object.values(AL)[i].id}">${Object.values(AL)[i].name}</label>
                    </li>`
               }
           }
           document.getElementById('EditAccessLevel').innerHTML=li;

       }
    </script>
@endsection
