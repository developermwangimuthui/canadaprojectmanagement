<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectParticipantRequest;
use App\Http\Resources\ProjectParticipantResource;
use App\Models\ProjectParticipant;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
class ProjectParticipantsController extends Controller
{
    public function index()
    {
        $allprojectParticipants = ProjectParticipant::all();
        $projectParticipants = ProjectParticipantResource::collection($allprojectParticipants);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectParticipants' => $projectParticipants
        ], Response::HTTP_OK);
    }

    public function store(ProjectParticipantRequest $request)
    {
        $projectParticipants = new ProjectParticipant();
        $projectParticipants ->project_id  = $request->input('project_id');
        $projectParticipants ->position = $request->input('position');
        $projectParticipants ->comment = $request->input('comment');
        $projectParticipants ->rate = $request->input('rate');
        $projectParticipants ->unit = $request->input('unit');
        $projectParticipants ->save();
        $id = $projectParticipants->id;

        $allprojectParticipants = ProjectParticipant::where('id',$id)->get();
        $projectParticipants = ProjectParticipantResource::collection($allprojectParticipants);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectParticipants' => $projectParticipants
        ], Response::HTTP_OK);

    }
}
