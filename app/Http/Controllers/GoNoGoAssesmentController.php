<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoNoGoAssesmentRequest;
use App\Http\Resources\GoNoGoAssesmentResource;
use App\Models\GoNoGoAssesment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GoNoGoAssesmentController extends Controller
{


    public function index()
    {
        $allgonogoAssesments = GoNoGoAssesment::all();
        $gonogoAssesments = GoNoGoAssesmentResource::collection($allgonogoAssesments);
        return response([
            'error' => False,
            'message' => 'Success',
            'gonogoAssesments' => $gonogoAssesments
        ], Response::HTTP_OK);
    }

    public function store(GoNoGoAssesmentRequest $request)
    {
        $gonogoAssesments = new GoNoGoAssesment();
        $gonogoAssesments ->project_id  = $request->input('project_id');
        $gonogoAssesments ->relationship_establishment = $request->input('relationship_establishment');
        $gonogoAssesments ->wtdr = $request->input('wtdr');
        $gonogoAssesments ->piwc = $request->input('piwc');
        $gonogoAssesments ->aosrtbc  = $request->input('aosrtbc');
        $gonogoAssesments ->profit_expectation  = $request->input('profit_expectation');
        $gonogoAssesments ->secfp  = $request->input('secfp');
        $gonogoAssesments ->track_record   = $request->input('track_record');
        $gonogoAssesments ->rtcp  = $request->input('rtcp');
        $gonogoAssesments ->iwc  = $request->input('iwc');
        $gonogoAssesments ->biioc  = $request->input('biioc');
        $gonogoAssesments ->aoitb  = $request->input('aoitb');
        $gonogoAssesments ->ratpp  = $request->input('ratpp');
        $gonogoAssesments ->loc  = $request->input('loc');
        $gonogoAssesments ->pos  = $request->input('pos');
        $gonogoAssesments ->awcv  = $request->input('awcv');
        $gonogoAssesments ->ptgpp  = $request->input('ptgpp');
        $gonogoAssesments ->project_risks  = $request->input('project_risks');
        $gonogoAssesments ->ateltr  = $request->input('ateltr');
        $gonogoAssesments ->comments  = $request->input('comments');
        $gonogoAssesments ->save();
        $id = $gonogoAssesments->id;

        $allgonogoAssesments = GoNoGoAssesment::where('id',$id)->get();
        $gonogoAssesments = GoNoGoAssesmentResource::collection($allgonogoAssesments);
        return response([
            'error' => False,
            'message' => 'Success',
            'gonogoAssesments' => $gonogoAssesments
        ], Response::HTTP_OK);

    }
}
