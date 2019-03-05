<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
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
        'subject',
        'message' 
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function result() {
        return $this->belongsTo(Result::class);
    }
}
