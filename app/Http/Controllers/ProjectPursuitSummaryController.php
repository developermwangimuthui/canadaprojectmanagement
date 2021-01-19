<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectPursuitSummaryRequest;
use App\Http\Resources\ProjectPursuitSummaryResource;
use App\Models\Project;
use App\Models\ProjectPursuitSummary;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

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
        $projectspursuitsummarys = ProjectPursuitSummary::where('project_id', $id)->get();
        if (!$projectspursuitsummarys) {

            return response([
                'error' => true,
                'message' => 'PPS does not exist'
            ], Response::HTTP_OK);
        }else {

            if (Str::startsWith(request()->path(), 'api'))  {

                return response([
                    'error' => False,
                    'message' => 'Success',
                    'pps' => $projectspursuitsummarys
                ], Response::HTTP_OK);
            }else {
                return view('projectpursuitsummary.index',compact('projectspursuitsummarys','id'));
            }
        }

    }
    public function ppsEdit($id)
    {
        $projectspursuitsummarys = ProjectPursuitSummary::where('id', $id)->get();
        if (!$projectspursuitsummarys) {

            return response([
                'error' => true,
                'message' => 'PPS does not exist'
            ], Response::HTTP_OK);
        }else {

            if (Str::startsWith(request()->path(), 'api'))  {

                return response([
                    'error' => False,
                    'message' => 'Success',
                    'pps' => $projectspursuitsummarys
                ], Response::HTTP_OK);
            }else {
                return view('projectpursuitsummary.edit',compact('projectspursuitsummarys','id'));
            }
        }

    }
    public function ppsUpdate(Request $request)
    {

        ProjectPursuitSummary::where('id',$request->input('id'))
                    ->update([

                        'bos' => $request->input('bos'),
                        'stbc' => $request->input('stbc'),
                        'pedc' => $request->input('pedc'),
                        'proposal_timeline'  =>$request->input('proposal_timeline'),
                        'project_timeline'  =>$request->input('project_timeline'),
                        'project_stakeholders'=>$request->input('project_stakeholders'),
                        'pb_requirements'   =>$request->input('pb_requirements'),
                        'ipri'  => $request->input('ipri'),
                        'isbc'  => $request->input('isbc'),
                        'communication_notes'=>$request->input('communication_notes'),
                        'ofav'  => $request->input('ofav'),
                        'sredo'  => $request->input('sredo'),
                    ]);

                    $projectspursuitsummarys = ProjectPursuitSummary::where('id',$request->input('id'))->get();

                    if (!$projectspursuitsummarys) {

            return response([
                'error' => true,
                'message' => 'PPS does not exist'
            ], Response::HTTP_OK);
        }else {

            if (Str::startsWith(request()->path(), 'api'))  {

                return response([
                    'error' => False,
                    'message' => 'Success',
                    'pps' => $projectspursuitsummarys
                ], Response::HTTP_OK);
            }else {

                $id = ProjectPursuitSummary::where('id',$request->input('id'))->pluck('project_id')->first();
                return redirect()->route('singlePPS',$id);
            }
        }

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
        $project_id = $request->input('project_id');

        $pps = ProjectPursuitSummary::where('id',$id)->first();
        //$projectspursuitsummary = ProjectPursuitSummaryResource::collection($allprojectspursuitsummary);

        if (Str::startsWith(request()->path(), 'api'))  {

            return response([
                'error' => False,
                'message' => 'Success',
                'pps' => $pps
            ], Response::HTTP_OK);
        }else {
            return redirect()->route('singlePPS',$project_id);
        }

    }
}
