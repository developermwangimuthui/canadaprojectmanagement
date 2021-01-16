<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmergencyResponsePlanResource extends JsonResource
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
            'legal'=>$this->legal,
            'jmp'=>$this->jmp,
            'ptd'=>$this->ptd,
            'feild_crew'=>json_decode($this->feild_crew),
            'client_information'=>json_decode($this->client_information),
            'information'=>json_decode($this->information),
            'nearest_health_center'=>json_decode($this->nearest_health_center),
            'emercency_phone_numbers'=>json_decode($this->emercency_phone_numbers),
            'updated_at'=>$this->updated_at->format('d M, yy'),
        ];
    }
}
