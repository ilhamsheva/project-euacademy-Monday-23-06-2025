<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'event_course_id',
        'student_id',
        'payment_number',
        'amount',
        'payment_method',
        'reference',
        'status'
    ];

    public function eventCourse(){
        return $this->belongsTo(EventCourse::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
