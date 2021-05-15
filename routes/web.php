<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('proses_login',[AuthController::class,'proses_login']);
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::post('appointment/post',[AppointmentController::class,'postForm']);

Route::post('approveAppointment/post',[AdvisorController::class,'approveForm']);
Route::post('cancelAppointment/post',[AdvisorController::class,'cancelForm']);


// auth

Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['check_auth:admin']],function(){
        Route::get('/',[AdminController::class,'index']);
        Route::get('appointment',[AppointmentController::class,'index'])->name('appointment');
        Route::get('create-appointment',[AppointmentController::class,'create'])->name('create-appointment');
    });
    Route::group(['middleware'=>['check_auth:advisor']],function(){
        Route::get('advisor',[AdvisorController::class,'index'])->name('advisor');
    });
});
