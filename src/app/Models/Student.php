<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'birthday',
        'address',
        'educational_background'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function taskAnswers(){
        return $this->hasMany(TaskAnswer::class);
    }

    public function absences(){
        return $this->hasMany(Absence::class);
    }
}
