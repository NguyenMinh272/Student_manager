<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Subject extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Student::class, 'student_id','id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id','id');
    }
}
