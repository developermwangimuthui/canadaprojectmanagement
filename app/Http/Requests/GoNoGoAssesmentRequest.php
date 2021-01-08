<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GoNoGoAssesmentRequest extends FormRequest
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
            'project_id' => 'required|integer',
            'relationship_establishment' => 'required|integer',
            'wtdr' => 'required|integer',
            'piwc' => 'required|integer',
            'aosrtbc' => 'required|integer',
            'profit_expectation' => 'required|integer',
            'secfp' => 'required|integer',
            'track_record' => 'required|integer',
            'rtcp' => 'required|integer',
            'iwc' => 'required|integer',
            'biioc' => 'required|integer',
            'aoitb' => 'required|integer',
            'ratpp' => 'required|integer',
            'loc' => 'required|integer',
            'pos' => 'required|integer',
            'awcv' => 'required|integer',
            'ptgpp' => 'required|integer',
            'project_risks' => 'required|integer',
            'ateltr' => 'required|integer',
            'comments' => 'required|string',
        ];
    }
}
