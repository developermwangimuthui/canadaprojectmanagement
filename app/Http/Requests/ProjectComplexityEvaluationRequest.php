<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectComplexityEvaluationRequest extends FormRequest
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
            'project_id' => 'required',
            'pop' => 'required',
            'cos' => 'required',
            'rfps' => 'required',
            'es' => 'required',
            'sm' => 'required',
            'nod' => 'required',
            'nos' => 'required',
            'ss' => 'required',
            'pd' => 'required',
            'wwgtc' => 'required',
            'ei' => 'required',
            'pfi' => 'required',
            'ecr' => 'required',
            // 'additional_skills' => 'required',
        ];
    }
}
