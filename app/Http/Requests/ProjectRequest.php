<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectRequest extends FormRequest
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
            'name' => 'required',
            'reference_number' => 'required',
            'project_sponsor' => 'required',
            'pursuit_lead' => 'required',
            'project_manager' => 'required',
            'market_sector' => 'required',
            'type_of_work' => 'required',
            'region' => 'required',
            'expected_start_date' => 'required',
            'expected_end_date' => 'required',

        ];
    }
}
