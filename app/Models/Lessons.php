<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;
    protected $table = 'lessons';
    public $timestamps = true;
    public function courses()
    {
        return $this->belongsTo('App\Courses','course_id');
    }
    public function sections()
    {
        return $this->belongsTo('App\Sections','section_id');
    }
}
