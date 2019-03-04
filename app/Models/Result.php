<?php

namespace App\Models;

use App\Models\Note;
use App\Transformers\ResultTransformer;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $transformer = ResultTransformer::class;

    const SURVEY_STATUS_CREATED    = 'Created';    
    const SURVEY_STATUS_COMPLETED  = 'Completed';
    const SURVEY_STATUS_INCOMPLETE = 'Incomplete';

    const SURVEY_STATUS_FALSE = 'False';
    const SURVEY_STATUS_TRUE = 'True';

    const SURVEY_REVIEW_POSITIVE = 'positive';
    const SURVEY_REVIEW_NEGATIVE = 'negative';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'case_number', 
        'question1', 
        'question2', 
        'question3', 
        'question4', 
        'question5', 
        'language', 
        'feedback',
        'survey_status',
        'survey_review',
        'status',
        'url',
        'created_at',
        'updated_at'
    ];

    public function notes() {
        return $this->hasMany(Note::class, 'result_id', 'id');
    }
}
