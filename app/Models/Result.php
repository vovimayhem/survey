<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    const STATUS_INCOMPLETE = 'Incomplete';    
    const STATUS_COMPLETED  = 'Completed';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'case_number', 'question1', 'question2', 'question3', 'question4', 'question5', 'language', 'feedback', 'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token', 'updated_at',
    ];
}
