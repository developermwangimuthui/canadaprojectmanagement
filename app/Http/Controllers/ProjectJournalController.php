<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectJournalResource;
use App\Models\ProjectJournal;
use Illuminate\Http\Request;

class ProjectJournalController extends Controller
{
    public function index()
    {
        $allprojectJournal = ProjectJournal::all();
        $projectJournal=ProjectJournalResource::collection($allprojectJournal);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectJournal' => $projectJournal
        ], Response::HTTP_OK);
    }

    public function singleProject($id)
    {
        $singleprojectJournal = ProjectJournal::where('id',$id)->get();
        $projectJournal = ProjectJournalResource::collection($singleprojectJournal);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectJournal' => $projectJournal
        ], Response::HTTP_OK);
    }

    public function store(Request $request){
        $projectJournal = new ProjectJournal();
        $projectJournal ->project_id  = $request->input('project_id');
        $projectJournal ->date  = $request->input('date');
        $projectJournal ->temp  = $request->input('temp');
        $projectJournal ->pressure  = $request->input('pressure');
        $projectJournal ->humidity  = $request->input('humidity');
        $projectJournal ->scope_review  = $request->input('scope_review');
        $projectJournal ->flha_review  = $request->input('flha_review');
        $projectJournal ->crewcheckin  = $request->input('crewcheckin');
        $projectJournal ->feild_data_review  = $request->input('feild_data_review');
        $projectJournal ->comments  = $request->input('comments');
        $projectJournal->save();
        $id= $projectJournal->id;
        $singleprojectJournal = ProjectJournal::where('id',$id)->get();
        $projectJournal = ProjectJournalResource::collection($singleprojectJournal);
        return response([
            'error' => False,
            'message' => 'Success',
            'projectJournal' => $projectJournal
        ], Response::HTTP_OK);

    }
}
