<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_question',
        'file_slide',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_option',
        'lesson_id'
    ];

    /**
     * Relación con el modelo Lesson.
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
