<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;

    protected $table = 'course_user';

    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Courses', 'course_id');
    }
}
