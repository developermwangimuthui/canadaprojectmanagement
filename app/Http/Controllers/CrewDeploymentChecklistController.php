<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CrewDeploymentChecklistResource;
use App\Models\CrewDeploymentChecklist;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrewDeploymentChecklistController extends Controller
{
    public function index()
    {
        $allcrewDeploymentChecklist = CrewDeploymentChecklist::all();
        $crewDeploymentChecklist=CrewDeploymentChecklistResource::collection($allcrewDeploymentChecklist);
        return response([
            'error' => False,
            'message' => 'Success',
            'crewDeploymentChecklist' => $crewDeploymentChecklist
        ], Response::HTTP_OK);
    }

    public function singleProject($id)
    {
        $singlecrewDeploymentChecklist = CrewDeploymentChecklist::where('id',$id)->get();
        $crewDeploymentChecklist = CrewDeploymentChecklistResource::collection($singlecrewDeploymentChecklist);
        return response([
            'error' => False,
            'message' => 'Success',
            'crewDeploymentChecklist' => $crewDeploymentChecklist
        ], Response::HTTP_OK);
    }

    public function store(Request $request){
        $crewDeploymentChecklist = new CrewDeploymentChecklist();
        $crewDeploymentChecklist ->project_id  = $request->input('project_id');
        $crewDeploymentChecklist ->type  = $request->input('type');
        $crewDeploymentChecklist ->dsqse  = $request->input('dsqse');
        $crewDeploymentChecklist ->na  = $request->input('na');
        $crewDeploymentChecklist ->reviwed_and_discussed  = $request->input('reviwed_and_discussed');
        $crewDeploymentChecklist ->notes= $request->input('notes');
        $crewDeploymentChecklist->save();
        $id= $crewDeploymentChecklist->id;
        $singlecrewDeploymentChecklist = CrewDeploymentChecklist::where('id',$id)->get();
        $crewDeploymentChecklist = CrewDeploymentChecklistResource::collection($singlecrewDeploymentChecklist);
        return response([
            'error' => False,
            'message' => 'Success',
            'crewDeploymentChecklist' => $crewDeploymentChecklist
        ], Response::HTTP_OK);

    }
}
