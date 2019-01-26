<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyResponse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating1'  => 'required|integer',
            'rating2'  => 'required|integer',
            'rating3'  => 'required|integer',
            'rating4'  => 'required|integer',
            'quality'  => 'required',
            'feedback' => 'nullable|string',
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
    public function messages()
    {
        return [
            'rating1.required'  => Lang::get('survey.rating1_error'),
            'rating2.required'  => Lang::get('survey.rating2_error'),
            'rating3.required'  => Lang::get('survey.rating3_error'),
            'rating4.required'  => Lang::get('survey.rating4_error'),
            'quality.required'  => Lang::get('survey.quality_error'),
        ];
    }
}
