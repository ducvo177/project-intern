<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}
