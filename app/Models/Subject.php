<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    public $timestamps = false;
    protected $fillable = ['id','name'];

    public function studentSubject(){
        return $this->hasMany(Student_Subject::class, 'subject_id', 'id');
    }
}
