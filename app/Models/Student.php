<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'full_name',
        'address',
        'email',
        'password',
        'social_id',
        'birthday',
        'gender',
        'phone',
        'avatar',

    ];

    public function faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id','id');

    }
    public function studentSubject(){
        return $this->hasMany(Student_Subject::class, 'student_id', 'id');
    }
}
