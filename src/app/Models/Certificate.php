<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'upload_certificate',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
