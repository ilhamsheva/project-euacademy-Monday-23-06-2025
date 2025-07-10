<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'description',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function taskAnswers()
    {
        return $this->hasMany(TaskAnswer::class);
    }
}
