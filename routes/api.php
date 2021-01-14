<?php

use App\Models\ProjectPursuitSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectPursuitSummaryController;
use App\Http\Controllers\GoNoGoAssesmentController;
use App\Http\Controllers\ProjectLessonLearntSummaryController;
use App\Http\Controllers\ScheduleHourlyRateController;
use App\Http\Controllers\ProjectComplexityEvaluationController;
use App\Http\Controllers\ProjectParticipantsController;
use App\Http\Controllers\ProjectStagesController;
use App\Http\Controllers\ScopeWorkDescriptionController;
use App\Http\Controllers\WorkBreakdownStructureController;
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
    Route::get('project/{id}',[ProjectController::class,'singleProject']);
    Route::post('project/store',[ProjectController::class,'store']);

    //.................ProjectPursuitSummary............//

    Route::get('projectpursuitsummary/index',[ProjectPursuitSummaryController::class,'index']);
    Route::post('projectpursuitsummary/store',[ProjectPursuitSummaryController::class,'store']);

    //...........Go No Go Assesment ......................//

    Route::get('gonogoassesment/index',[GoNoGoAssesmentController::class,'index']);
    Route::post('gonogoassesment/store',[GoNoGoAssesmentController::class,'store']);

    //...................projectlessonlearntsummary.............//

    Route::get('projectlessonlearntsummary/index',[ProjectLessonLearntSummaryController::class,'index']);
    Route::post('projectlessonlearntsummary/store',[ProjectLessonLearntSummaryController::class,'store']);

    //...................schedulehourlyrate.............//

    Route::get('schedulehourlyrate/index',[ScheduleHourlyRateController::class,'index']);
    Route::post('schedulehourlyrate/store',[ScheduleHourlyRateController::class,'store']);

    //...................projectcomplexityevaluation.............//
    Route::get('projectcomplexityevaluation/index',[ProjectComplexityEvaluationController::class,'index']);
    Route::post('projectcomplexityevaluation/store',[ProjectComplexityEvaluationController::class,'store']);

    //...................projectcomplexityevaluation.............//
    Route::get('projectParticipants/index',[ProjectParticipantsController::class,'index']);
    Route::post('projectParticipants/store',[ProjectParticipantsController::class,'store']);


    //...................projectStages.............//
    Route::get('projectStages/index',[ProjectStagesController::class,'index']);
    Route::post('projectStages/store',[ProjectStagesController::class,'store']);

    //...................scopeworkdescription.............//
    Route::get('scopeworkdescription/index',[ScopeWorkDescriptionController::class,'index']);
    Route::post('scopeworkdescription/store',[ScopeWorkDescriptionController::class,'store']);

    //...................workbreakdownStructure.............//
    Route::get('workbreakdownStructure/index',[WorkBreakdownStructureController::class,'index']);
    Route::post('workbreakdownStructure/store',[WorkBreakdownStructureController::class,'store']);



});

