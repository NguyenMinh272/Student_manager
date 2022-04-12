<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculties';
    public $timestamps = false;
    protected $fillable = ['id','name'];

    public function students(){
        return $this->hasMany(Student::class, 'faculty_id', 'id');
    }

}
