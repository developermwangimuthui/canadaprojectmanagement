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

    public function store(ProjectComplexityEvaluationRequest $request)
    {
        $projectComplexityEvaluation = new ProjectComplexityEvaluation();
        $projectComplexityEvaluation ->project_id  = $request->input('project_id');
        $projectComplexityEvaluation ->description = $request->input('description');
        $projectComplexityEvaluation ->complexity_rating = $request->input('complexity_rating');
        $projectComplexityEvaluation ->save();
        $id = $projectComplexityEvaluation->id;

        $allprojectComplexityEvaluation = ProjectComplexityEvaluation::where('id',$id)->get();
        $projectComplexityEvaluation = ProjectComplexityEvaluationResource::collection($allprojectComplexityEvaluation);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectComplexityEvaluation' => $projectComplexityEvaluation
        ], Response::HTTP_OK);

    }
}
