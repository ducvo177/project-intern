<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
}
