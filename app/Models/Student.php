<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'full_name',
        'address',
        'email',
        'password',
        'social_id',
        'birthday',
        'gender',
        'phone',
        'avatar',
        'faculty_id'

    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

}
