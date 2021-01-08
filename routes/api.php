<?php

use App\Models\ProjectPursuitSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectPursuitSummaryController;
use App\Http\Controllers\GoNoGoAssesmentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/newlogin', [UserAuthController::class, 'userLogin']);
Route::post('/newregister', [UserAuthController::class, 'registerUser']);
Route::post('/forgotpassword', [UserAuthController::class, 'forgot_password']);
Route::post('/tokenconnfrm', [UserAuthController::class, 'token_connfrm']);
Route::post('/changePassword', [UserAuthController::class, 'changePassword']);


Route::group(['middleware' => ['auth:api']], function () {
    //..................Project ................//
    Route::get('project/index',[ProjectController::class,'index']);
    Route::post('project/store',[ProjectController::class,'store']);

    //.................ProjectPursuitSummary............//

    Route::get('projectpursuitsummary/index',[ProjectPursuitSummaryController::class,'index']);
    Route::post('projectpursuitsummary/store',[ProjectPursuitSummaryController::class,'store']);

    //...........Go No Go Assesment ......................//

    Route::get('gonogoassesment/index',[GoNoGoAssesmentController::class,'index']);
    Route::post('gonogoassesment/store',[GoNoGoAssesmentController::class,'store']);


});

