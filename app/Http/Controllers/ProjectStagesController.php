<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStageRequest;
use App\Http\Resources\ProjectStageResource;
use App\Models\ProjectStage;
use Illuminate\Http\Request;
Use Symfony\Component\HttpFoundation\Response;
class ProjectStagesController extends Controller
{
    public function index()
    {
        $allprojectStages = ProjectStage::all();
        $projectStages = ProjectStageResource::collection($allprojectStages);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectStages' => $projectStages
        ], Response::HTTP_OK);
    }

    public function store(ProjectStageRequest $request)
    {
        $projectStages = new ProjectStage();
        $projectStages ->project_id  = $request->input('project_id');
        $projectStages ->stages = $request->input('stages');
        $projectStages ->save();
        $id = $projectStages->id;

        $allprojectStages = ProjectStage::where('id',$id)->get();
        $projectStages = ProjectStageResource::collection($allprojectStages);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectStages' => $projectStages
        ], Response::HTTP_OK);

    }
}
