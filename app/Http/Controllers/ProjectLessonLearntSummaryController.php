<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectLessonLearntSummaryRequest;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectLessonLearntSummaryResource;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\ProjectLessonLearntSummary;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectLessonLearntSummaryController extends Controller
{
    //


    public function index()
    {
        $allprojectlessonlearntsummary = ProjectLessonLearntSummary::all();
        $projectlessonlearntsummary= ProjectLessonLearntSummaryResource::collection($allprojectlessonlearntsummary);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectlessonlearntsummary' => $projectlessonlearntsummary
        ], Response::HTTP_OK);
    }

    public function store(ProjectLessonLearntSummaryRequest $request)
    {
        $projectlessonlearntsummary = new ProjectLessonLearntSummary();
        $projectlessonlearntsummary->project_id = $request->input('project_id');
        $projectlessonlearntsummary->project_goals_attained = $request->input('project_goals_attained');
        $projectlessonlearntsummary->what_went_well = $request->input('what_went_well');
        $projectlessonlearntsummary->what_went_wrong = $request->input('what_went_wrong');
        $projectlessonlearntsummary->better_handled_if_done_diff = $request->input('better_handled_if_done_diff');
        $projectlessonlearntsummary->recomendations = $request->input('recomendations');
        $projectlessonlearntsummary->beyond_control = $request->input('beyond_control');
        $projectlessonlearntsummary->surprises = $request->input('surprises');
        $projectlessonlearntsummary->anticipated_but_didnt_happen = $request->input('anticipated_but_didnt_happen');
        $projectlessonlearntsummary->mistakes_avoided = $request->input('mistakes_avoided');
        $projectlessonlearntsummary->possible_automation = $request->input('possible_automation');
        $projectlessonlearntsummary->missing_skills = $request->input('missing_skills');
        $projectlessonlearntsummary->save();
        $id = $projectlessonlearntsummary->id;
        $allprojectlessonlearntsummary = ProjectLessonLearntSummary::where('id',$id)->get();
        $projectlessonlearntsummary = ProjectLessonLearntSummaryResource::collection($allprojectlessonlearntsummary);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectlessonlearntsummary' => $projectlessonlearntsummary
        ], Response::HTTP_OK);

    }
}
