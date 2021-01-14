<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectPursuitSummaryRequest;
use App\Http\Resources\ProjectPursuitSummaryResource;
use App\Models\Project;
use App\Models\ProjectPursuitSummary;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectPursuitSummaryController extends Controller
{

    public function index()
    {
        $allProjects = ProjectPursuitSummary::all();
        $projectspursuitsummary = ProjectPursuitSummaryResource::collection($allProjects);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectspursuitsummary' => $projectspursuitsummary
        ], Response::HTTP_OK);
    }

    public function singlePPS($id)
    {
        $p = ProjectPursuitSummary::where('id', $id)->first();
        if (!$p) {
            return response([
                'error' => true,
                'message' => 'PPS does not exist'
            ], Response::HTTP_OK);
        }
        return response([
            'error' => False,
            'message' => 'Success',
            'project' => $p
        ], Response::HTTP_OK);
    }

    public function store(ProjectPursuitSummaryRequest $request)
    {
        $projectspursuitsummary = new ProjectPursuitSummary();
        $projectspursuitsummary ->project_id  = $request->input('project_id');
        $projectspursuitsummary ->bos = $request->input('bos');
        $projectspursuitsummary ->stbc = $request->input('stbc');
        $projectspursuitsummary ->pedc = $request->input('pedc');
        $projectspursuitsummary ->proposal_timeline  = $request->input('proposal_timeline');
        $projectspursuitsummary ->project_timeline  = $request->input('project_timeline');
        $projectspursuitsummary ->project_stakeholders  = $request->input('project_stakeholders');
        $projectspursuitsummary ->pb_requirements   = $request->input('pb_requirements');
        $projectspursuitsummary ->ipri  = $request->input('ipri');
        $projectspursuitsummary ->isbc  = $request->input('isbc');
        $projectspursuitsummary ->communication_notes  = $request->input('communication_notes');
        $projectspursuitsummary ->ofav  = $request->input('ofav');
        $projectspursuitsummary ->sredo  = $request->input('sredo');
        $projectspursuitsummary ->save();
        $id = $projectspursuitsummary->id;

        $pps = ProjectPursuitSummary::where('id',$id)->first();
        //$projectspursuitsummary = ProjectPursuitSummaryResource::collection($allprojectspursuitsummary);
        return response([
            'error' => False,
            'message' => 'Success',
            'pps' => $pps
        ], Response::HTTP_OK);

    }
}
