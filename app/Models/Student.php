<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'name',
        'address',
        'email',
        'social_id',
        'birthday',
        'gender',
        'phone',
        'image',
        'faculty_id',

    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject','student_id','subject_id')->withPivot('mark');
    }

}
