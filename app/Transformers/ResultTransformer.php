<?php

namespace App\Transformers;

use App\Models\Result;
use League\Fractal\TransformerAbstract;

class ResultTransformer extends TransformerAbstract
{

    public function transform(Result $result)
    {
        return [
            'result_id'             => (int)     $result->id,
            'case'                  => (string)  $result->case_number,
            'value_question1'       => (integer) $result->question1,
            'value_question2'       => (integer) $result->question2,
            'value_question3'       => (integer) $result->question3,
            'value_question4'       => (integer) $result->question4,
            'value_question5'       => (string)  $result->question5,
            'lang'                  => (string)  $result->language,
            'feedback'              => (string)  $result->feedback,
            'current_survey_status' => (string)  $result->survey_status,
            'review'                => (string)  $result->survey_review,
            'status'                => (string)  $result->status,
            'created'               => (string)  $result->created_at,
            'last_updated'          => (string)  $result->updated_at,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'result_id'             => 'id',
            'case'                  => 'case_number',
            'value_question1'       => 'question1',
            'value_question2'       => 'question2',
            'value_question3'       => 'question3',
            'value_question4'       => 'question4',
            'value_question5'       => 'question5',
            'lang'                  => 'language',
            'feedback'              => 'feedback',
            'current_survey_status' => 'survey_status',
            'review'                => 'survey_review',
            'status'                => 'status',
            'created'               => 'created_at',
            'last_updated'          => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index) {
        $attributes = [
            'id'            => 'result_id',
            'case_number'   => 'case',
            'question1'     => 'value_question1',
            'question2'     => 'value_question2',
            'question3'     => 'value_question3',
            'question4'     => 'value_question4',
            'question5'     => 'value_question5',
            'language'      => 'lang',
            'feedback'      => 'feedback',
            'survey_status' => 'current_survey_status',
            'survey_review' => 'review',
            'status'        => 'status',
            'created_at'    => 'created',
            'updated_at'    => 'last_updated',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
