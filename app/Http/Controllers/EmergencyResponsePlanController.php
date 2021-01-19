<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmergencyResponsePlanResource;
use App\Models\EmergencyResponsePlan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmergencyResponsePlanController extends Controller
{
    public function index()
    {
        $allerp = EmergencyResponsePlan::all();
        $erp =EmergencyResponsePlanResource::collection($allerp);
        return response([
            'error' => False,
            'message' => 'Success',
            'emergencyResponsePlan' => $erp
        ], Response::HTTP_OK);
    }

    public function singleProject($id)
    {
        $singleerp = EmergencyResponsePlan::where('id',$id)->get();
        $erp = EmergencyResponsePlanResource::collection($singleerp);
        return response([
            'error' => False,
            'message' => 'Success',
            'emergencyResponsePlan' => $erp
        ], Response::HTTP_OK);
    }

    public function store(Request $request){
        $erp = new EmergencyResponsePlan();
        $erp ->project_id  = $request->input('project_id');
        $erp ->legal  = $request->input('legal');
        $erp ->jmp  = $request->input('jmp');
        $erp ->ptd  = $request->input('ptd');
        $erp ->feild_crew  = json_encode($request->input('feild_crew'));
        $erp ->client_information  = json_encode($request->input('client_information'));
        $erp ->information  = json_encode($request->input('information'));
        $erp ->nearest_health_center  = json_encode($request->input('nearest_health_center'));
        $erp ->emercency_phone_numbers  = json_encode($request->input('emercency_phone_numbers'));
        $erp->save();
        $id= $erp->id;
        $singleerp = EmergencyResponsePlan::where('id',$id)->get();
        $erp = EmergencyResponsePlanResource::collection($singleerp);
        return response([
            'error' => False,
            'message' => 'Success',
            'emergencyResponsePlan' => $erp
        ], Response::HTTP_OK);

    }
}
