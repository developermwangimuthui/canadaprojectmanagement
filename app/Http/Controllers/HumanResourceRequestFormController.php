<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HumanResourceRequestFormResource;
use App\Models\HumanResourceRequestClientManagementInstruction;
use App\Models\HumanResourceRequestForm;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HumanResourceRequestFormController extends Controller
{
    public function index()
    {
        $allHumanResourceRequestFormResource = HumanResourceRequestForm::all();
        $HumanResourceRequestFormResource = HumanResourceRequestFormResource::collection($allHumanResourceRequestFormResource);
        return response([
            'error' => False,
            'message' => 'Success',
            'HumanResourceRequestFormResource' => $HumanResourceRequestFormResource
        ], Response::HTTP_OK);
    }

    public function singleProject($id)
    {
        $singleHumanResourceRequestFormResource = HumanResourceRequestForm::where('id',$id)->get();
//        dd($singleHumanResourceRequestFormResource);
        $HumanResourceRequestFormResource = HumanResourceRequestFormResource::collection($singleHumanResourceRequestFormResource);
        return response([
            'error' => False,
            'message' => 'Success',
            'HumanResourceRequestFormResource' => $HumanResourceRequestFormResource
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $humanResourceRequestForm = new HumanResourceRequestForm();
        $humanResourceRequestForm->project_id = $request->input('project_id');
        $humanResourceRequestForm->services = json_encode($request->input('services'));
        $humanResourceRequestForm->level = $request->input('level');
        $humanResourceRequestForm->hours = $request->input('hours');
        $humanResourceRequestForm->project_id = $request->input('project_id');
        $humanResourceRequestForm->ínstructions = $request->input('ínstructions');
        $humanResourceRequestForm->project_id = $request->input('project_id');
        $humanResourceRequestForm->crews_required = $request->input('crews_required');
        $humanResourceRequestForm->expirience_level = $request->input('expirience_level');
        $humanResourceRequestForm->skills = json_encode($request->input('skills'));
        $humanResourceRequestForm->other_qualifications = $request->input('other_qualifications');
        $humanResourceRequestForm->shift_duration = $request->input('shift_duration');
        $humanResourceRequestForm->project_id = $request->input('project_id');
        $humanResourceRequestForm->control = $request->input('control');
        $humanResourceRequestForm->control_location = $request->input('control_location');
        $humanResourceRequestForm->datum = $request->input('datum');
        $humanResourceRequestForm->survey_data_package = json_encode($request->input('survey_data_package'));
        $humanResourceRequestForm->safety_training_required = json_encode($request->input('safety_training_required'));
        $humanResourceRequestForm->fsd = json_encode($request->input('fsd'));
        $humanResourceRequestForm->special_ppe = json_encode($request->input('special_ppe'));
        $humanResourceRequestForm->sertcw = json_encode($request->input('sertcw'));
        $humanResourceRequestForm->feild_supplies_materials = json_encode($request->input('feild_supplies_materials'));
        $humanResourceRequestForm->project_id = $request->input('project_id');
        $humanResourceRequestForm->sec = $request->input('sec');
        $humanResourceRequestForm->twp = $request->input('twp');
        $humanResourceRequestForm->rge = $request->input('rge');
        $humanResourceRequestForm->meridian = $request->input('meridian');
        $humanResourceRequestForm->longitude = $request->input('longitude');
        $humanResourceRequestForm->latitude = $request->input('latitude');
        $humanResourceRequestForm->utmc = $request->input('utmc');
        $humanResourceRequestForm->map = $request->input('map');
        $humanResourceRequestForm->project_id = $request->input('project_id');
        $humanResourceRequestForm->meeting = $request->input('meeting');
        $humanResourceRequestForm->jwith = $request->input('with');
        $humanResourceRequestForm->location = $request->input('location');
        $humanResourceRequestForm->date = $request->input('date');
        $humanResourceRequestForm->phone = $request->input('phone');
        $humanResourceRequestForm->contact_name = $request->input('contact_name');
        $humanResourceRequestForm->owner_infor = $request->input('owner_infor');
        $humanResourceRequestForm->crew_to_contact_land_owner = $request->input('crew_to_contact_land_owner');
        $humanResourceRequestForm->time = $request->input('time');
        $humanResourceRequestForm->hotel = $request->input('hotel');
        $humanResourceRequestForm->accomodation = $request->input('accomodation');
        $humanResourceRequestForm->near_camp = $request->input('near_camp');
        $humanResourceRequestForm->other = $request->input('other');
        $humanResourceRequestForm->save();
        $id = $humanResourceRequestForm->id;

        $singleHumanResourceRequestFormResource = HumanResourceRequestForm::where('id',$id)->get();
        $HumanResourceRequestFormResource = HumanResourceRequestFormResource::collection($singleHumanResourceRequestFormResource);
        return response([
            'error' => False,
            'message' => 'Success',
            'humanResourceRequestFormResource' => $HumanResourceRequestFormResource
        ], Response::HTTP_OK);

    }
}
