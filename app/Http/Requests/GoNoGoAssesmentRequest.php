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
            'project_id' => 'required|string',
            'er' => 'required|integer',
            'dr' => 'required|integer',
            'ii' => 'required|integer',
            'scope' => 'required|integer',
            'pm' => 'required|integer',
            'se' => 'required|integer',
            'tr' => 'required|integer',
            'he' => 'required|integer',
            'ci' => 'required|integer',
            'bic' => 'required|integer',
            'aoi' => 'required|integer',
            'ra' => 'required|integer',
            'cl' => 'required|integer',
            'sp' => 'required|integer',
            'cv' => 'required|integer',
            'rgpp' => 'required|integer',
            'pr' => 'required|integer',
            'lr' => 'required|integer',
        ];
    }
}
