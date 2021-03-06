<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['id','name'];

    public function students()
    {
     return $this->belongsToMany(Student::class, 'student_subject','subject_id','student_id')->withPivot('mark');
    }
}
