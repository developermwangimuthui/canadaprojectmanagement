<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;


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
    public function webindex()
    {
        $allProjects = Project::all();
        return view('project.index',compact('allProjects'));
    }

    public function singleProject($id)
    {
        $p = Project::where('id', $id)->first();
        if (!$p) {
            return response([
                'error' => true,
                'message' => 'Project does not exist'
            ], Response::HTTP_OK);
        }
        return response([
            'error' => False,
            'message' => 'Success',
            'project' => $p
        ], Response::HTTP_OK);
    }
    public function details($id)
    {
        $projects = Project::where('id', $id)->get();
        // dd($projects);
        if ($projects) {
            return view('project.details',compact('projects'));
        }

    }

    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $project->name = $request->input('name');
        $project->reference_number = $request->input('reference_number');
        $project->project_sponsor = $request->input('project_sponsor');
        $project->pursuit_lead = $request->input('pursuit_lead');
        $project->project_manager = $request->input('project_manager');
        $project->market_sector = $request->input('market_sector');
        $project->type_of_work = $request->input('type_of_work');
        $project->region = $request->input('region');
        $project->expected_start_date = $request->input('expected_start_date');
        $project->expected_end_date = $request->input('expected_end_date');
        $project->save();
        $id = $project->id;
        if (Str::startsWith(request()->path(), 'api'))  {

        $p = Project::where('id', $id)->first();
        //$projects = ProjectResource::collection($allProjects);
        return response([
            'error' => False,
            'message' => 'Success',
            'project' => $p
        ], Response::HTTP_OK);
    }else {
        return redirect()->route('project.home');
    }
    }
}
