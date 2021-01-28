<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectComplexityEvaluationResource extends JsonResource
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
            "id"=>$this->id,
            "project_id"=>$this->project_id,
            "pop"=>$this->pop,
            "cos"=>$this->cos,
            "rfps"=>$this->rfps,
            "es"=>$this->es,
            "sm"=>$this->sm,
            "nod"=>$this->nod,
            "nos"=>$this->nos,
            "ss"=>$this->ss,
            "pd"=>$this->pd,
            "wwgtc"=>$this->wwgtc,
            "ei"=>$this->ei,
            "pfi"=>$this->pfi,
            "ecr"=>$this->ecr,
            "additional_skills"=>json_decode($this->additional_skills)
        ];
    }
}
