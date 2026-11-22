<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
    ];
   public function courses()
    {
    return $this->belongsToMany(Course::class);
    }
}