<?php

use App\Http\Controllers\Admin\AccessLevelController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClassLinkController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WeeklyScheduleController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('Admin')->middleware('auth')->group(function (){
//    Dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
//    Users
    Route::get('users',[UsersController::class,'index'])->name('users');
    Route::post('users/specialUser',[UsersController::class,'SUser'])->name('user');
    Route::post('users/getinformation',[UsersController::class,'GetInformation'])->name('GetInformation');
    Route::post('users/edit',[UsersController::class,'Edit'])->name('EditUser');
    Route::post('users/delete',[UsersController::class,'destroy'])->name('DeleteUser');
    Route::post('users/roles',[UsersController::class,'Roles'])->name('Roles');
    Route::get('users/autocpmplete/{id?}',[UsersController::class,'AutoComplete'])->name('autocpmplete');

//    AccessLevel
    Route::get('accessLevel',[AccessLevelController::class,'index'])->name('accesslevel');
    Route::post('accessLevel/store',[AccessLevelController::class,'Store'])->name('AccessLevelStore');
    Route::post('accessLevel/edit',[AccessLevelController::class,'Edit'])->name('AccessLevelEdit');

//    weekly-schedule
    Route::get('weekly-schedule',[WeeklyScheduleController::class,'index'])->name('weekly-schedule');
    Route::post('weekly-schedule/add',[WeeklyScheduleController::class,'AddWeekSh'])->name('Addweekly-schedule');
    Route::post('weekly-schedule/edit',[WeeklyScheduleController::class,'EditWeekSh'])->name('Editweekly-schedule');
    Route::post('weekly-schedule/delete',[WeeklyScheduleController::class,'DeleteWeekSh'])->name('Deleteweekly-schedule');
//    Setting
    //Announcement
    Route::get('setting',[SettingController::class,'index'])->name('setting');
    Route::post('setting/Announcement/Add',[SettingController::class,'AddAnnouncement'])->name('AddAnnouncement');
    Route::post('setting/Announcement/Edit',[SettingController::class,'EditAnnouncement'])->name('EditAnnouncement');
    Route::post('setting/Announcement/Delete',[SettingController::class,'destroyAnnouncement'])->name('DeleteAnnouncement');

    //Slider
    Route::post('setting/Slider/Add',[SettingController::class,'StoreImg'])->name('AddSlider');
    Route::post('setting/Slider/Edit',[SettingController::class,'EditImg'])->name('EditSlider');
    Route::post('setting/Slider/Delete',[SettingController::class,'destroyImg'])->name('DeleteSlider');
    //Term
    Route::get('term',[TermController::class,'index'])->name('term');
    Route::post('/term/add',[TermController::class,'Add'])->name('AddTerm');
    Route::post('term/edit',[TermController::class,'Edit'])->name('editterm');
    Route::post('term/delete',[TermController::class,'Delete'])->name('deleteterm');
    //Chart
    Route::get('chart',[ChartController::class,'index'])->name('chart');
    Route::post('/chart/add',[ChartController::class,'Add'])->name('AddChart');
    //Contact
    Route::get('contact',[ContactController::class,'index'])->name('contact');
    Route::post('contact/delete',[ContactController::class,'Delete'])->name('DeleteContact');
    //ClassLink
    Route::get('classlinks',[ClassLinkController::class,'index'])->name('ClassLink');
    Route::post('classlink/addclass',[ClassLinkController::class,'Add'])->name('AddClass');
    Route::post('classlink/editclass',[ClassLinkController::class,'Edit'])->name('EditClass');
    //Teacher
    Route::get('teacher',[TeacherController::class,'index'])->name('teacher');
    Route::post('teacher/add',[TeacherController::class,'Add'])->name('Addteacher');
    Route::post('teacher/edit',[TeacherController::class,'Edit'])->name('editteacher');
    Route::post('teacher/delete',[TeacherController::class,'Delete'])->name('deleteteacher');
    Route::get('teacher/autocpmplete/{type}/{id?}',[TeacherController::class,'AutoComplete'])->name('Tautocpmplete');
    Route::get('teacher/GetInformation/{id}',[TeacherController::class,'GetInformation'])->name('TGetInformation');
    //Project
    Route::get('project',[ProjectController::class,'Index'])->name('Project');
    Route::post('project/add',[ProjectController::class,'Add'])->name('AddProject');
    Route::post('project/edit',[ProjectController::class,'Edit'])->name('EditProject');
    Route::get('project/show',[ProjectController::class,'ShowProject'])->name('ShowProject');
    Route::post('project/accept',[ProjectController::class,'Accept'])->name('AcceptProject');
    Route::post('project/denial',[ProjectController::class,'Denial'])->name('DenialProject');
});

Route::prefix('Download')->group(function (){
    Route::get('view/{type}/{id}',[GuestController::class,'View'])->name('View');
    Route::get('download/{type}/{id}',[GuestController::class,'Download'])->name('Download');

});
