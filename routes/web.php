<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
require 'AdminRoute.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/',[GuestController::class,'Index'])->name('index');
Route::get('/Announcements',[GuestController::class,'Announcements'])->name('announcements');
Route::get('/weeklySchedule',[GuestController::class,'WeeklySchedule'])->name('weeklySchedule');

Route::get('/classlinks',[GuestController::class,'ClassLinks'])->name('classlinks');

Route::post('/classlinkssearch',[GuestController::class,'ClassLinksSearch'])->name('classlinkssearch');
//Route::get('/about-us',[GuestController::class,'About_us'])->name('about-us');
Route::post('/contactus',[GuestController::class,'Add'])->name('AddContact');

Route::get('/classlist/searchclass/{id?}',[GuestController::class,'SearchClass'])->name('searchclass');
