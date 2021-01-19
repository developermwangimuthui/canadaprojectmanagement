<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ScheduleHourlyRateRequest extends FormRequest
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
            'type' => 'required|string',
            'pesd' => 'required|string',
            'comment' => 'required|string',
            'rate' => 'required',
            'unit' => 'required',
        ];
    }
}
