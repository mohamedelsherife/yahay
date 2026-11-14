<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    'name',
    'code',
    'credit_hours',
    'course_description',
    'course_semester',
    'course_prereq',
];
}