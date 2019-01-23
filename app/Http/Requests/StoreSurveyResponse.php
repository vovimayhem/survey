<?php

namespace App\Http\Requests;

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
            'rating1' => 'required|integer',
            'rating2' => 'required|integer',
            'rating3' => 'required|integer',
            'rating4' => 'required|integer',
            'quality' => 'required',
            'feedback' => 'required|min:10',
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
            'rating1.required|integer' => 'Please rate question one before continuing.',
            'rating2.required|integer' => 'Please rate question two before continuing.',
            'rating3.required|integer' => 'Please rate question three before continuing.',
            'rating4.required|integer' => 'Please rate question four before continuing.',
            'quality.required'         => 'Please let us know if you will come back with Community Tax.',
            'feedback.required|min:5' => 'Please leave a feedback with at least 10 words.',
        ];
    }
}
