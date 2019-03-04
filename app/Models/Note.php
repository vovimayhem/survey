<?php

namespace App\Models;

use App\Models\User;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'user_id', 
        'result_id', 
        'comment' 
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function result() {
        return $this->belongsTo(Result::class);
    }
}
