<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HumanResourceRequestFormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'project_id'=>$this->project_id,
            'services'=>json_decode($this->services),
            'level'=>$this->level,
            'hours'=>$this->hours,
            'ínstructions'=>$this->ínstructions,
            'crews_required'=>$this->crews_required,
            'expirience_level'=>$this->expirience_level,
            'skills'=>json_decode($this->skills),
            'other_qualifications'=>$this->other_qualifications,
            'shift_duration'=>$this->shift_duration,
            'control'=>$this->control,
            'control_location'=>$this->control_location,
            'datum'=>$this->datum,
            'survey_data_package'=>json_decode($this->survey_data_package),
            'fsd'=>json_decode($this->fsd),
            'safety_training_required'=>json_decode($this->safety_training_required),
            'special_ppe'=>json_decode($this->special_ppe),
            'feild_supplies_materials'=>json_decode($this->feild_supplies_materials),
            'sec'=>$this->sec,
            'twp'=>$this->twp,
            'rge'=>$this->rge,
            'meridian'=>$this->meridian,
            'longitude'=>$this->longitude,
            'latitude'=>$this->latitude,
            'utmc'=>$this->utmc,
            'map'=>$this->map,
            'meeting'=>$this->meeting,
            'with'=>$this->jwith,
            'location'=>$this->location,
            'date'=>$this->date,
            'phone'=>$this->phone,
            'contact_name'=>$this->contact_name,
            'owner_infor'=>$this->owner_infor,
            'crew_to_contact_land_owner'=>$this->crew_to_contact_land_owner,
            'time'=>$this->time,
            'hotel'=>$this->hotel,
            'accomodation'=>$this->accomodation,
            'near_camp'=>$this->near_camp,
            'other'=>$this->other,
            'created_at'=>$this->created_at->format('d M, yy'),
        ];    }
}
