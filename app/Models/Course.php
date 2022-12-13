<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function courses()
    {
        return $this->hasMany(CourseUser::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
