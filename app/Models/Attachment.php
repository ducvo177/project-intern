<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'attachable_type',
        'file_name',
        'attachable_id',
        'extention',
        'mime_type',
        'size',
    ];

    public function attachable()
    {
        return $this->morphTo();
    }
}
