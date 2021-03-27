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
    public function singleProjectPCEResults($project_id)
    {

        $pop = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('pop')->first();
        $cos = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('cos')->first();
        $rfps = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('rfps')->first();
        $es = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('es')->first();
        $sm = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('sm')->first();
        $nod = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('nod')->first();
        $nos = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('nos')->first();
        $ss = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('ss')->first();
        $pd = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('pd')->first();
        $wwgtc = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('wwgtc')->first();
        $ei = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('ei')->first();
        $pfi = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('pfi')->first();
        $ecr = ProjectComplexityEvaluation::where('project_id', $project_id)->pluck('ecr')->first();
        $results = $pop+$cos+$rfps+$es+$sm+$nod+$nos+$ss+$pd+$wwgtc+$ei+$pfi+$ecr;




            if (Str::startsWith(request()->path(), 'api'))  {

                return response([
                    'error' => False,
                    'message' => 'Success',
                    'singleProjectPCEResults' => $results
                ], Response::HTTP_OK);
            }else{

                return view('projectcomplexityevaluation.index',compact('pces','id'));


            }


    }


    public function store(ProjectComplexityEvaluationRequest $request)
    {
        $projectComplexityEvaluation = new ProjectComplexityEvaluation();
        $projectComplexityEvaluation ->project_id  = $request->input('project_id');
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
        $projectComplexityEvaluation ->other =$request->input('other');
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
