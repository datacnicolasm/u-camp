<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'context_workshop',
        'indicaciones_workshop',
        'cod_form',
        'text_form',
        'year_form',
        'lesson_id'
    ];

    /**
     * Relación con el modelo Lesson.
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    static public function createWorkshopDefault(Lesson $lesson)
    {
        $workshop = Workshop::create([
            'lesson_id' => $lesson->id,
        ]);

        return $workshop;
    }

    /**
     * The laws that belong to the workshop.
     */
    public function laws()
    {
        return $this->belongsToMany(Law::class);
    }

    public function statements()
    {
        return $this->hasMany(Statement::class);
    }

    public function entries()
    {
        return $this->hasMany(WorkshopEntry::class);
    }
}
