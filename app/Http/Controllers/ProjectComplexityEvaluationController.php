<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectComplexityEvaluationRequest;
use App\Http\Resources\ProjectComplexityEvaluationResource;
use App\Models\ProjectComplexityEvaluation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $p = ProjectComplexityEvaluation::where('project_id', $id)->get()->all();
        if (!$p) {
            return response([
                'error' => true,
                'message' => 'PCE does not exist'
            ], Response::HTTP_OK);
        }
        $pce = ProjectComplexityEvaluationResource::collection($p);
        return response([
            'error' => False,
            'message' => 'Success',
            'pps' => $pce
        ], Response::HTTP_OK);
    }


    public function store(ProjectComplexityEvaluationRequest $request)
    {
        $projectComplexityEvaluation = new ProjectComplexityEvaluation();
        $projectComplexityEvaluation ->project_id  = $request->input('project_id');
        $projectComplexityEvaluation ->type = $request->input('type');
        $projectComplexityEvaluation ->description = $request->input('description');
        $projectComplexityEvaluation ->complexity_rating = $request->input('complexity_rating');
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
