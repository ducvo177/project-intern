<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'video_type',
        'video_url',
        'time',
        'preview',
        'content',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}
