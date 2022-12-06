<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function sections()
    {
        return $this->belongsTo('App\Section', 'section_id');
    }
}
