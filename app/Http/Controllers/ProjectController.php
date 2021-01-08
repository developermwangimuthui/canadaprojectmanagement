<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    public function index()
    {
        $allProjects = Project::all();
        $projects = ProjectResource::collection($allProjects);
        return response([
            'error' => False,
            'message' => 'Success',
            'projects' => $projects
        ], Response::HTTP_OK);
    }

    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $project->name = $request->input('name');
        $project->reference_number = $request->input('reference_number');
        $project->project_sponsor = $request->input('project_sponsor');
        $project->pursuit_lead = $request->input('pursuit_lead');
        $project->date = $request->input('date');
        $project->save();
        $id = $project->id;

        $allProjects = Project::where('id',$id)->get();
        $projects = ProjectResource::collection($allProjects);
        return response([
            'error' => False,
            'message' => 'Success',
            'projects' => $projects
        ], Response::HTTP_OK);

    }
}
