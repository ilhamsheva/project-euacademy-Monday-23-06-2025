<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'upload_modul',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
