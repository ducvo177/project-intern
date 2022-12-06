<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public $timestamps = true;

    public function courses()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
