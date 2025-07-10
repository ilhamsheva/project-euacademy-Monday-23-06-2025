<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'event_course_id',
        'name',
        'capacity',
        'isFull',
        'start_registration',
        'end_registration'
    ];

    public function eventCourse(){
        return $this->hasMany(EventCourse::class);
    }
}
