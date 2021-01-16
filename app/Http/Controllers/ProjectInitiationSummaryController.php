<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectInitiationSummaryResource;
use App\Models\ProjectInitiationSummaryCommunicationPlan;
use App\Models\ProjectInitiationSummaryExpectedDeliverable;
use App\Models\ProjectInitiationSummarySubcontractor;
use App\Models\ProjectInitiationSummaryTeam;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectInitiationSummaryController extends Controller
{

    public function singleProject($project_id)
    {
        $allprojectInitiationSummary = [];
        $projectInitiationSummaryTeam = ProjectInitiationSummaryTeam::where('project_id', $project_id)->get()->all();
        $projectInitiationSummarySubcontractor = ProjectInitiationSummarySubcontractor::where('project_id', $project_id)->get()->all();
        $projectInitiationSummaryExpectedDeliverable = ProjectInitiationSummaryExpectedDeliverable::where('project_id', $project_id)->get()->all();
        $projectInitiationSummaryCommunicationPlan = ProjectInitiationSummaryCommunicationPlan::where('project_id', $project_id)->get()->all();
        $allprojectInitiationSummary = array_merge($projectInitiationSummaryTeam,$projectInitiationSummarySubcontractor,$projectInitiationSummaryExpectedDeliverable,$projectInitiationSummaryCommunicationPlan);
//            ->merge($projectInitiationSummaryExpectedDeliverable)->merge($projectInitiationSummaryCommunicationPlan);


        $projectInitiationSummary = ProjectInitiationSummaryResource::collection($allprojectInitiationSummary);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectInitiationSummary' => $projectInitiationSummary
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $projectInitiationSummayTeam = new ProjectInitiationSummaryTeam();
        $projectInitiationSummayTeam->project_id = $request->input('project_id');
        $projectInitiationSummayTeam->tname = $request->input('tname');
        $projectInitiationSummayTeam->project_participants_id = $request->input('project_participants_id');
        $projectInitiationSummayTeam->skills_required = json_encode($request->input('skills_required'));
        $projectInitiationSummayTeam->expirience_level = $request->input('expirience_level');
        $projectInitiationSummayTeam->save();
        $projectInitiationSummarySubcontractor = new ProjectInitiationSummarySubcontractor();
        $projectInitiationSummarySubcontractor->project_id = $request->input('project_id');
        $projectInitiationSummarySubcontractor->sname = $request->input('sname');
        $projectInitiationSummarySubcontractor->company = $request->input('company');
        $projectInitiationSummarySubcontractor->expertise_responsibility = $request->input('expertise_responsibility');
        $projectInitiationSummarySubcontractor->contracted_value = $request->input('contracted_value');
        $projectInitiationSummarySubcontractor->expectations = $request->input('expectations');
        $projectInitiationSummarySubcontractor->save();
        $projectInitiationSummaryExpectedDeliverable = new ProjectInitiationSummaryExpectedDeliverable();
        $projectInitiationSummaryExpectedDeliverable->project_id = $request->input('project_id');
        $projectInitiationSummaryExpectedDeliverable->type = $request->input('dtype');
        $projectInitiationSummaryExpectedDeliverable->fo = $request->input('fo');
        $projectInitiationSummaryExpectedDeliverable->description = $request->input('description');
        $projectInitiationSummaryExpectedDeliverable->responsibilty = $request->input('dresponsibilty');
        $projectInitiationSummaryExpectedDeliverable->save();
        $projectInitiationSummaryCommunicationPlan = new ProjectInitiationSummaryCommunicationPlan();
        $projectInitiationSummaryCommunicationPlan->project_id = $request->input('project_id');
        $projectInitiationSummaryCommunicationPlan->type = $request->input('ctype');
        $projectInitiationSummaryCommunicationPlan->ie = $request->input('ie');
        $projectInitiationSummaryCommunicationPlan->format = $request->input('format');
        $projectInitiationSummaryCommunicationPlan->responsibilty = $request->input('cresponsibilty');
        $projectInitiationSummaryCommunicationPlan->frequency = $request->input('frequency');
        $projectInitiationSummaryCommunicationPlan->save();

        $project_id = $request->input('project_id');
        $projectInitiationSummaryTeam = ProjectInitiationSummaryTeam::where('project_id', $project_id)->get();
        $projectInitiationSummarySubcontractor = ProjectInitiationSummarySubcontractor::where('project_id', $project_id)->get();
        $projectInitiationSummaryExpectedDeliverable = ProjectInitiationSummaryExpectedDeliverable::where('project_id', $project_id)->get();
        $projectInitiationSummaryCommunicationPlan = ProjectInitiationSummaryCommunicationPlan::where('project_id', $project_id)->get();
        $allprojectInitiationSummary = $projectInitiationSummaryTeam->merge($projectInitiationSummarySubcontractor)->merge($projectInitiationSummaryExpectedDeliverable)->merge($projectInitiationSummaryCommunicationPlan);

        $projectInitiationSummary = ProjectInitiationSummaryResource::collection($allprojectInitiationSummary);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectInitiationSummary' => $projectInitiationSummary
        ], Response::HTTP_OK);

    }
}
