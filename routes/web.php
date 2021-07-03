<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FellowsController;
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
Route::post('register_advisor/post',[AuthController::class,'register']);



Route::get('test',[AdminController::class,'googlesheet']);

// ADMIN
Route::post('appointment/post',[FellowsController::class,'postForm']);
Route::post('invoice/post',[FellowsController::class,'postFellowsProgress']);
Route::post('fellowAdvisor/post/{id}',[FellowsController::class,'postFellowsAdvisor']);


// ADVISOR
Route::post('approveFellows/post',[AdvisorController::class,'approveForm']);
Route::post('cancelFellows/post',[AdvisorController::class,'cancelForm']);


// auth

Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['check_auth:admin']],function(){
        Route::get('/',[AdminController::class,'index']);
        Route::get('fellows',[FellowsController::class,'index'])->name('fellows');
        Route::get('edit-fellows/{email}',[FellowsController::class,'edit']);
        Route::get('fellows-progress',[FellowsController::class,'fellowsprogress'])->name('fellows-progress');
        Route::get('edit-fellowsProgress/{email}',[FellowsController::class,'editFellowsProgress']);
        Route::get('fellowsAdvisor',[FellowsController::class,'fellowsAdvisor'])->name('fellowsAdvisor');
        Route::get('edit-fellowsAdvisor/{id}',[FellowsController::class,'editFellowsAdvisor']);
        Route::get('bootcamp-history/{name}',[FellowsController::class,'bootcampHistory']);

        Route::get('getDataFellowProgress/{idAdvisor}',[FellowsController::class,'getDataFellowProgress']);
        Route::get('advisorList',[FellowsController::class,'listAdvisor'])->name('advisorList');
        Route::get('menteeList',[FellowsController::class,'listMentee'])->name('menteeList');
    });
    Route::group(['middleware'=>['check_auth:advisor']],function(){
        Route::get('advisor',[AdvisorController::class,'index'])->name('advisor');
    });
});
