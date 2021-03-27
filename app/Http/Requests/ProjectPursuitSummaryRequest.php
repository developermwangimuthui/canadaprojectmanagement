<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectPursuitSummaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_id' => 'required|string',
            'bos' => 'required|string',
            'stbc' => 'required|string',
            'pedc' => 'required|string',
            'proposal_timeline' => 'required|string',
            'project_timeline' => 'required|string',
            'project_stakeholders' => 'required|string',
            'pb_requirements' => 'required|string',
            'ipri' => 'required|string',
            'isbc' => 'required|string',
            'communication_notes' => 'required|string',
            'ofav' => 'required|string',
            'sredo' => 'required|string',
        ];
    }
}
