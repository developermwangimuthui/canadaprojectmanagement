<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HazardIdentificationRequest;
use App\Http\Resources\HazardIdentificationResource;
use App\Models\HazardIdentification;
use App\Models\HazardIdentificationProjectRiskRegister;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HazardIdentificationController extends Controller
{
    public function index()
    {
        $allHazards = HazardIdentification::all();
        $hazards = HazardIdentificationResource::collection($allHazards);
        return response([
            'error' => False,
            'message' => 'Success',
            'hazards' => $hazards
        ], Response::HTTP_OK);
    }

    public function singleProject($id)
    {
        $singleHazard = HazardIdentification::join('hazard_identification_project_risk_registers','hazard_identification_project_risk_registers.project_id','=','hazard_identifications.project_id')->where('hazard_identifications.id',$id)->get();
        $hazards = HazardIdentificationResource::collection($singleHazard);
        return response([
            'error' => False,
            'message' => 'Success',
            'hazards' => $hazards
        ], Response::HTTP_OK);
    }
    public function store(HazardIdentificationRequest  $request)
    {
        $hazardIdentification = new HazardIdentification();
        $hazardIdentification->project_id = $request->input('preoject_id');
        $hazardIdentification->type = $request->input('type');
        $hazardIdentification->specific_task = $request->input('specific_task');
        $hazardIdentification->hazard_type = $request->input('hazard_type');
        $hazardIdentification->probability_to_occur = $request->input('probability_to_occur');
        $hazardIdentification->control = $request->input('control');
        $hazardIdentification->responsibilty = $request->input('responsibilty');
        $hazardIdentification->save();
        $id= $hazardIdentification->id;
        $hazard_identification_project_risk_registers = new HazardIdentificationProjectRiskRegister();
        $hazard_identification_project_risk_registers->project_id = $request->input('project_id');
        $hazard_identification_project_risk_registers->risk = $request->input('risk');
        $hazard_identification_project_risk_registers->risk_trigger = $request->input('risk_trigger');
        $hazard_identification_project_risk_registers->risk_response = $request->input('risk_response');
        $hazard_identification_project_risk_registers->risk_impact = $request->input('risk_impact');
        $hazard_identification_project_risk_registers->save();

        $singleHazard = HazardIdentification::join('hazard_identification_project_risk_registers','hazard_identification_project_risk_registers.project_id','=','hazard_identifications.project_id')->where('hazard_identifications.id',$id)->get();
        $hazards = HazardIdentificationResource::collection($singleHazard);
        return response([
            'error' => False,
            'message' => 'Success',
            'hazards' => $hazards
        ], Response::HTTP_OK);

    }
}
