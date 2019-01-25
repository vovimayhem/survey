<?php

namespace App\Transformers;

use App\Models\Result;
use League\Fractal\TransformerAbstract;

class EmployeeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Result $result)
    {
        return [
            'id' => (int)$result->id,
            'case_number' => (string) $result->case_number,
            'question1'   => (integer) $result->question1,
            'question2'   => (integer) $result->question2,
            'question3'   => (integer) $result->question3,
            'question4'   => (integer) $result->question4,
            'question5'   => (boolean) $result->question5,
            'language'    => (string)  $result->language,
            'feedback'    => (string)  $result->feedback,
            'status'      => (string)  $result->status,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id' => 'id',
            'case_number' => 'case_number' ,
            'question1'   => 'question1',
            'question2'   => 'question2',
            'question3'   => 'question3',
            'question4'   => 'question4',
            'question5'   => 'question5',
            'language'    => 'language',
            'feedback'    => 'feedback',
            'status'      => 'status',

        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
