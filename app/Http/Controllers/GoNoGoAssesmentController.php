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
        $gonogoAssesments ->question = $request->input('question');
        $gonogoAssesments ->rating = $request->input('rating');
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
