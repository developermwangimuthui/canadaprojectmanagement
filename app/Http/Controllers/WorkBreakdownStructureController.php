<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkBreakdownStructureRequest;
use App\Http\Resources\WorkBreakdownStructureResource;
use App\Models\WorkBreakdownStructure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkBreakdownStructureController extends Controller
{
    public function index()
    {
        $allworkbreakdownStructure = WorkBreakdownStructure::all();
        $workbreakdownStructure = WorkBreakdownStructureResource::collection($allworkbreakdownStructure);
        return response([
            'error' => False,
            'message' => 'Success',
            'workbreakdownStructure' => $workbreakdownStructure
        ], Response::HTTP_OK);
    }

    public function store(WorkBreakdownStructureRequest $request)
    {
        $workbreakdownStructure = new WorkBreakdownStructure();
        $workbreakdownStructure ->project_id  = $request->input('project_id');
        $workbreakdownStructure ->scope_work_description_id = $request->input('scope_work_description_id');
        $workbreakdownStructure ->project_participant_id = $request->input('project_participant_id');
        $workbreakdownStructure ->hours = $request->input('hours');
        $workbreakdownStructure ->save();
        $id = $workbreakdownStructure->id;

        $allworkbreakdownStructure = WorkBreakdownStructure::where('id',$id)->get();
        $workbreakdownStructure = WorkBreakdownStructureResource::collection($allworkbreakdownStructure);
        return response([
            'error' => False,
            'message' => 'Success',
            'workbreakdownStructure' => $workbreakdownStructure
        ], Response::HTTP_OK);

    }
}
