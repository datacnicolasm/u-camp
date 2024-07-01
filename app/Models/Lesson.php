<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'points_xp',
        'chapter_id'
    ];

    /**
     * Get the chapter that owns the lesson.
     */
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
