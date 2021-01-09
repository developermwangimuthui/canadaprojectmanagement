<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectLessonLearntSummaryRequest extends FormRequest
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
            'project_goals_attained' => 'required|string',
            'what_went_well' => 'required|string',
            'what_went_wrong' => 'required|string',
            'better_handled_if_done_diff' => 'required|string',
            'recomendations' => 'required|string',
            'beyond_control' => 'required|string',
            'surprises' => 'required|string',
            'anticipated_but_didnt_happen' => 'required|string',
            'mistakes_avoided' => 'required|string',
            'possible_automation' => 'required|string',
            'missing_skills' => 'required|string',
        ];
    }
}
