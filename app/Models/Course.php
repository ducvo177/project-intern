<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

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
