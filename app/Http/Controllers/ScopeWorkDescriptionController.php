<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScopeWorkDescriptionRequest;
use App\Http\Resources\ScopeWorkDescriptionResource;
use App\Models\ScopeWorkDescription;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ScopeWorkDescriptionController extends Controller
{
    public function index()
    {
        $allscopeworkdescription = ScopeWorkDescription::all();
        $scopeworkdescription = ScopeWorkDescriptionResource::collection($allscopeworkdescription);
        return response([
            'error' => False,
            'message' => 'Success',
            'scopeworkdescription' => $scopeworkdescription
        ], Response::HTTP_OK);
    }

    public function store(ScopeWorkDescriptionRequest $request)
    {
        $scopeworkdescription = new ScopeWorkDescription();
        $scopeworkdescription ->project_id  = $request->input('project_id');
        $scopeworkdescription ->project_stage_id  = $request->input('project_stage_id');
        $scopeworkdescription ->scope_work_description = $request->input('scope_work_description');
        $scopeworkdescription ->save();
        $id = $scopeworkdescription->id;

        $allscopeworkdescription = ScopeWorkDescription::where('id',$id)->get();
        $scopeworkdescription = ScopeWorkDescriptionResource::collection($allscopeworkdescription);
        return response([
            'error' => False,
            'message' => 'Success',
            'scopeworkdescription' => $scopeworkdescription
        ], Response::HTTP_OK);

    }
}
