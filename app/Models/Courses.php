<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    public $timestamps = true;

    public function courses()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }
}
