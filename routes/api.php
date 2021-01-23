<?php

use App\Http\Controllers\HumanResourceRequestFormController;
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
use App\Http\Controllers\HazardIdentificationController;
use App\Http\Controllers\EmergencyResponsePlanController;
use App\Http\Controllers\CrewDeploymentChecklistController;
use App\Http\Controllers\ProjectJournalController;
use App\Http\Controllers\ProjectInitiationSummaryController;
use App\Http\Controllers\CompanyController;
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

// Route::prefix('v1')->group(function () {
Route::group(['middleware' => ['auth:api']], function () {
    //..................Company ................//
    Route::get('company/index',[CompanyController::class,'index']);
    Route::get('company/connect{id}',[CompanyController::class,'connect']);
    Route::get('company/{id}',[CompanyController::class,'singleCompany']);
    Route::post('company/store',[CompanyController::class,'store']);

    //..................Project ................//
    Route::get('project/index',[ProjectController::class,'index']);
    Route::get('project/{id}',[ProjectController::class,'singleProject']);
    Route::post('project/store',[ProjectController::class,'store']);

    //.................ProjectPursuitSummary............//

    Route::get('projectpursuitsummary/index',[ProjectPursuitSummaryController::class,'index']);
    Route::get('projectpursuitsummary/{id}',[ProjectPursuitSummaryController::class,'singlePPS']);
    Route::post('projectpursuitsummary/store',[ProjectPursuitSummaryController::class,'store']);

    //...........Go No Go Assesment ......................//

    Route::get('gonogoassesment/index',[GoNoGoAssesmentController::class,'index']);
    Route::get('gonogoassesment/{id}',[GoNoGoAssesmentController::class,'singleGonogo']);
    Route::post('gonogoassesment/store',[GoNoGoAssesmentController::class,'store']);

    //...................projectlessonlearntsummary.............//

    Route::get('projectlessonlearntsummary/index',[ProjectLessonLearntSummaryController::class,'index']);
    Route::post('projectlessonlearntsummary/store',[ProjectLessonLearntSummaryController::class,'store']);

    //...................schedulehourlyrate.............//

    Route::get('schedulehourlyrate/index',[ScheduleHourlyRateController::class,'index']);
    Route::post('schedulehourlyrate/store',[ScheduleHourlyRateController::class,'store']);

    //...................projectcomplexityevaluation.............//
    Route::get('projectcomplexityevaluation/index',[ProjectComplexityEvaluationController::class,'index']);
    Route::get('projectcomplexityevaluation/{id}',[ProjectComplexityEvaluationController::class,'singleProjectPCE']);
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

    //...................humanResourceRequestForm.............//
    Route::get('humanResourceRequestForm/index',[HumanResourceRequestFormController::class,'index']);
    Route::get('humanResourceRequestForm/{id}',[HumanResourceRequestFormController::class,'singleProject']);
    Route::post('humanResourceRequestForm/store',[HumanResourceRequestFormController::class,'store']);

    //...................hazardIdentifications.............//
    Route::get('hazardIdentifications/index',[HazardIdentificationController::class,'index']);
    Route::get('hazardIdentifications/{id}',[HazardIdentificationController::class,'singleProject']);
    Route::post('hazardIdentifications/store',[HazardIdentificationController::class,'store']);

    //...................emergencyResponsePlan.............//
    Route::get('emergencyResponsePlan/index',[EmergencyResponsePlanController::class,'index']);
    Route::get('emergencyResponsePlan/{id}',[EmergencyResponsePlanController::class,'singleProject']);
    Route::post('emergencyResponsePlan/store',[EmergencyResponsePlanController::class,'store']);


    //...................crewDeploymentChecklist.............//
    Route::get('crewDeploymentChecklist/index',[CrewDeploymentChecklistController::class,'index']);
    Route::get('crewDeploymentChecklist/{id}',[CrewDeploymentChecklistController::class,'singleProject']);
    Route::post('crewDeploymentChecklist/store',[CrewDeploymentChecklistController::class,'store']);

    //...................projectJournal.............//
    Route::get('projectJournal/index',[ProjectJournalController::class,'index']);
    Route::get('projectJournal/{id}',[ProjectJournalController::class,'singleProject']);
    Route::post('projectJournal/store',[ProjectJournalController::class,'store']);


    //...................ProjectInitiationSummary.............//
    Route::get('projectInitiationSummary/index',[ProjectInitiationSummaryController::class,'index']);
    Route::get('projectInitiationSummary/{id}',[ProjectInitiationSummaryController::class,'singleProject']);
    Route::post('projectInitiationSummary/store',[ProjectInitiationSummaryController::class,'store']);



});
// });

