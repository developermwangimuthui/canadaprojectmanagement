<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectComplexityEvaluationRequest;
use App\Http\Resources\ProjectComplexityEvaluationResource;
use App\Models\ProjectComplexityEvaluation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
class ProjectComplexityEvaluationController extends Controller
{
    public function index()
    {
        $allprojectComplexityEvaluation = ProjectComplexityEvaluation::all();
        $projectComplexityEvaluation = ProjectComplexityEvaluationResource::collection($allprojectComplexityEvaluation);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectComplexityEvaluation' => $projectComplexityEvaluation
        ], Response::HTTP_OK);
    }

    public function singleProjectPCE($id)
    {

        $pces = ProjectComplexityEvaluation::where('project_id', $id)->get()->all();

        if ($pces) {

        $pce = ProjectComplexityEvaluationResource::collection($pces);

            if (Str::startsWith(request()->path(), 'api'))  {

                return response([
                    'error' => False,
                    'message' => 'Success',
                    'pps' => $pce
                ], Response::HTTP_OK);
            }else{

                return view('projectcomplexityevaluation.index',compact('pces','id'));


            }
        }

    }


    public function store(ProjectComplexityEvaluationRequest $request)
    {
        $projectComplexityEvaluation = new ProjectComplexityEvaluation();
        $projectComplexityEvaluation ->project_id  = $request->input('project_id');
        $projectComplexityEvaluation ->type = $request->input('type');
        $projectComplexityEvaluation ->pop = $request->input('pop');
        $projectComplexityEvaluation ->cos = $request->input('cos');
        $projectComplexityEvaluation ->rfps = $request->input('rfps');
        $projectComplexityEvaluation ->es = $request->input('es');
        $projectComplexityEvaluation ->sm = $request->input('sm');
        $projectComplexityEvaluation ->nod = $request->input('nod');
        $projectComplexityEvaluation ->nos = $request->input('nos');
        $projectComplexityEvaluation ->ss = $request->input('ss');
        $projectComplexityEvaluation ->pd = $request->input('pd');
        $projectComplexityEvaluation ->wwgtc = $request->input('wwgtc');
        $projectComplexityEvaluation ->ei = $request->input('ei');
        $projectComplexityEvaluation ->pfi = $request->input('pfi');
        $projectComplexityEvaluation ->ecr = $request->input('ecr');
        $projectComplexityEvaluation ->additional_skills = json_encode($request->input('additional_skills'));
        $projectComplexityEvaluation ->save();
        $id = $projectComplexityEvaluation->id;

        $allprojectComplexityEvaluation = ProjectComplexityEvaluation::where('id',$id)->get();
        $projectComplexityEvaluation = ProjectComplexityEvaluationResource::collection($allprojectComplexityEvaluation);
        return response([
            'error' => False,
            'message' => 'Success',
            'pce' => $projectComplexityEvaluation
        ], Response::HTTP_OK);

    }
}
