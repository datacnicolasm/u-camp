<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'curso_id'
    ];

    /**
     * Get the course that owns the chapter.
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    /**
     * Get the lessons for the chapter.
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
