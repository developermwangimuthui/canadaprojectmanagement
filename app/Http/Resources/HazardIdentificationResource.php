<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HazardIdentificationResource extends JsonResource
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
            'type'=>$this->type,
            'specific_task'=>$this->specific_task,
            'hazard_type'=>$this->hazard_type,
            'probability_to_occur'=>$this->probability_to_occur,
            'control'=>$this->control,
            'responsibilty'=>$this->responsibilty,
            'risk'=>$this->risk,
            'risk_trigger'=>$this->risk_trigger,
            'risk_response'=>$this->risk_response,
            'risk_impact'=>$this->risk_impact ,
            'updated_at'=>$this->updated_at->format('d M, yy'),
        ];
    }
}
