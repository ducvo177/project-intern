<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'link',
        'price',
        'old_price',
        'created_by',
        'lessons',
        'view_count',
        'benefits',
        'fqa',
        'is_feature',
        'is_online',
        'description',
        'content',
        'meta_title',
        'meta_desc',
        'meta_keyword',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public $timestamps = true;

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
