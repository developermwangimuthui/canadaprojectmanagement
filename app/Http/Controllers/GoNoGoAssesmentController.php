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
    public function singleGonogoResult($project_id)
    {
        $er = GoNoGoAssesment::where('project_id',$project_id)->pluck('er')->first();
        $dr = GoNoGoAssesment::where('project_id',$project_id)->pluck('dr')->first();
        $ii = GoNoGoAssesment::where('project_id',$project_id)->pluck('ii')->first();
        $scope = GoNoGoAssesment::where('project_id',$project_id)->pluck('scope')->first();
        $pm = GoNoGoAssesment::where('project_id',$project_id)->pluck('pm')->first();
        $se = GoNoGoAssesment::where('project_id',$project_id)->pluck('se')->first();
        $tr = GoNoGoAssesment::where('project_id',$project_id)->pluck('tr')->first();
        $he = GoNoGoAssesment::where('project_id',$project_id)->pluck('he')->first();
        $ci = GoNoGoAssesment::where('project_id',$project_id)->pluck('ci')->first();
        $bic = GoNoGoAssesment::where('project_id',$project_id)->pluck('bic')->first();
        $aoi = GoNoGoAssesment::where('project_id',$project_id)->pluck('aoi')->first();
        $ra = GoNoGoAssesment::where('project_id',$project_id)->pluck('ra')->first();
        $cl = GoNoGoAssesment::where('project_id',$project_id)->pluck('cl')->first();
        $sp = GoNoGoAssesment::where('project_id',$project_id)->pluck('sp')->first();
        $cv = GoNoGoAssesment::where('project_id',$project_id)->pluck('cv')->first();
        $rgpp = GoNoGoAssesment::where('project_id',$project_id)->pluck('rgpp')->first();
        $pr = GoNoGoAssesment::where('project_id',$project_id)->pluck('pr')->first();
        $lr = GoNoGoAssesment::where('project_id',$project_id)->pluck('lr')->first();
        $results = $er+$dr+$ii+$scope+$pm+$se+$tr+$he+$ci+$bic+$aoi+$ra+$cl+$sp+$cv+$rgpp+$pr+$lr;

        // dd($results);
        // $gonogoAssesments = GoNoGoAssesmentResource::collection($results);
        return response([
            'error' => False,
            'message' => 'Success',
            'gonogoAssesments' => $results
        ], Response::HTTP_OK);
    }

    public function store(GoNoGoAssesmentRequest $request)
    {
        $gonogoAssesments = new GoNoGoAssesment();
        $gonogoAssesments->project_id  = $request->input('project_id');
        $gonogoAssesments->er = $request->input('er');
        $gonogoAssesments->dr = $request->input('dr');
        $gonogoAssesments->ii  = $request->input('ii');
        $gonogoAssesments->scope  = $request->input('scope');
        $gonogoAssesments->pm  = $request->input('pm');
        $gonogoAssesments->se  = $request->input('se');
        $gonogoAssesments->tr  = $request->input('tr');
        $gonogoAssesments->he  = $request->input('he');
        $gonogoAssesments->ci  = $request->input('ci');
        $gonogoAssesments->bic  = $request->input('bic');
        $gonogoAssesments->aoi  = $request->input('aoi');
        $gonogoAssesments->ra  = $request->input('ra');
        $gonogoAssesments->cl  = $request->input('cl');
        $gonogoAssesments->sp  = $request->input('sp');
        $gonogoAssesments->cv  = $request->input('cv');
        $gonogoAssesments->rgpp  = $request->input('rgpp');
        $gonogoAssesments->pr  = $request->input('pr');
        $gonogoAssesments->lr  = $request->input('lr');
        $gonogoAssesments->save();
        $id = $gonogoAssesments->id;

        $allgonogoAssesments = GoNoGoAssesment::where('id', $id)->get();
        $gonogoAssesments = GoNoGoAssesmentResource::collection($allgonogoAssesments);
        return response([
            'error' => False,
            'message' => 'Success',
            'gonogoAssesments' => $gonogoAssesments
        ], Response::HTTP_OK);
    }
}
