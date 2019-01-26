<?php

namespace App\Models;

use App\Transformers\ResultTransformer;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $transformer = ResultTransformer::class;

    const STATUS_INCOMPLETE = false;    
    const STATUS_COMPLETED  = true;


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
        'status',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
