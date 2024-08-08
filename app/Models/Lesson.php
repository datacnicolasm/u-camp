<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'points_xp',
        'order',
        'chapter_id'
    ];

    // Relación con el modelo Point (opcional si se necesita)
    public function points()
    {
        return $this->hasMany(Point::class);
    }

    /**
     * Get the chapter that owns the lesson.
     */
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Relación con el modelo Question.
     */
    public function question()
    {
        return $this->hasOne(Question::class);
    }

    /**
     * Relación con el modelo Workshop.
     */
    public function workshop()
    {
        return $this->hasOne(Workshop::class);
    }
}
