<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model['created_by'] = Auth::user()->id;

            if (!empty($model['benefits'])) {
                $model['benefits'] = json_encode($model['benefits']);
            }
        });
    }

    protected $fillable = [
        'name',
        'slug',
        'link',
        'price',
        'old_price',
        'category_id',
        'benefits',
        'is_online',
        'description',
        'content',
        'meta_title',
        'meta_desc',
        'meta_keyword',
    ];

    public const IS_ONLINE = [
        'online' => 1,
        'offline' => 0,
    ];

    protected function online(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->is_online == static::IS_ONLINE['online'] ? "Online" : "Offline";
            }
        );
    }

    public function courseable()
    {
      return $this->morphTo();
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
