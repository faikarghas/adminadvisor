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
Route::post('registerAdvisors',[AuthController::class,'registerAdvisors']);




// ADMIN
Route::post('appointment/post/{id}',[FellowsController::class,'postForm']);
Route::post('postFellowsProgress/{id}',[FellowsController::class,'postFellowsProgress']);
Route::post('fellowAdvisor/post/{id}',[FellowsController::class,'postFellowsAdvisor']);


// ADVISOR
Route::post('approveFellows/post',[AdvisorController::class,'approveForm']);
Route::post('cancelFellows/post',[AdvisorController::class,'cancelForm']);
Route::post('fellowsAssigned/post/{id}',[AdvisorController::class,'postFellowsAssigned']);
Route::post('fellowsFellowsProgressAdvisor/post/{email}',[AdvisorController::class,'postFellowsProgressAdvisor']);



// AUTH
Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['check_auth:admin']],function(){
        Route::get('/',[AdminController::class,'index']);
        Route::get('fellows',[FellowsController::class,'index'])->name('fellows');
        Route::get('fellows-summary',[FellowsController::class,'summary'])->name('summary');
        Route::get('edit-fellows/{id}',[FellowsController::class,'edit']);
        Route::get('fellows-progress',[FellowsController::class,'fellowsprogress'])->name('fellows-progress');
        Route::get('edit-fellowsProgress/{id}',[FellowsController::class,'editFellowsProgress']);
        Route::get('fellows-advisor',[FellowsController::class,'fellowsAdvisor'])->name('fellowsAdvisor');
        Route::get('edit-fellowsAdvisor/{id}',[FellowsController::class,'editFellowsAdvisor']);
        Route::get('bootcamp-history/{name}',[FellowsController::class,'bootcampHistory']);
        Route::get('getDataFellowProgress/{idAdvisor}',[FellowsController::class,'getDataFellowProgress']);
        Route::get('advisorList',[FellowsController::class,'listAdvisor'])->name('advisorList');
        Route::get('menteeList',[FellowsController::class,'listMentee'])->name('menteeList');
    });
    Route::group(['middleware'=>['check_auth:advisor']],function(){
        Route::get('fellows-assigned',[AdvisorController::class,'index'])->name('fellows-assigned');
        Route::get('signed-fellows',[AdvisorController::class,'signedFellows'])->name('signed-fellows');
        Route::get('edit-fellows-assigned/{id}',[AdvisorController::class,'edit']);
        Route::get('fellows-progress-advisor',[AdvisorController::class,'fellowsProgressAdvisor'])->name('fellowsProgressAdvisor');
        Route::get('edit-fellowsProgressAdvisor/{id}',[AdvisorController::class,'editFellowsProgressAdvisor']);
        Route::get('data-advisor',[AdvisorController::class,'data'])->name('data');
        Route::post('postDataAdvisor/post/{id}',[AdvisorController::class,'postDataAdvisor']);
    });
});


Route::get('getFellowData',[FellowsController::class,'getFellowData'])->name('getFellowData');
Route::post('updateData',[FellowsController::class,'updateData'])->name('updateData');
Route::post('updateDataAdvisor',[FellowsController::class,'updateDataAdvisor'])->name('updateDataAdvisor');

