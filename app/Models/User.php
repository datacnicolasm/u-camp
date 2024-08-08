<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first-name',
        'last-name',
        'email',
        'password',
        'has_groups'
    ];

    // Relación con el modelo Point
    public function points()
    {
        return $this->hasMany(Point::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps();
    }

    public function group(): BelongsToMany
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function hasViewedLesson($lessonId)
    {
        return $this->lessons()->where('lesson_id', $lessonId)->where('user_id', $this->id)->exists();
    }

    /**
     * Get the chapters for the course.
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public static function getCoursesWithProgress(User $user)
    {
        // Obtener todas las lecciones vistas por el usuario
        $lessonsSeen = $user->lessons;

        // Obtener los cursos que ha empezado el usuario
        $courses = DB::table('cursos')
            ->join('chapters', 'cursos.id', '=', 'chapters.curso_id')
            ->join('lessons', 'chapters.id', '=', 'lessons.chapter_id')
            ->join('lesson_user', 'lessons.id', '=', 'lesson_user.lesson_id')
            ->where('lesson_user.user_id', $user->id)
            ->select('cursos.*')
            ->distinct()
            ->get();

        // Calcular el porcentaje de avance por curso
        $coursesWithProgress = [];
        foreach ($courses as $course) {
            $totalLessons = Lesson::whereHas('chapter', function ($query) use ($course) {
                $query->where('curso_id', $course->id);
            })->count();

            $lessonsSeenInCourse = $lessonsSeen->filter(function ($lesson) use ($course) {
                return $lesson->chapter->curso_id == $course->id;
            })->count();

            $progress = $totalLessons > 0 ? round(($lessonsSeenInCourse / $totalLessons) * 100) : 0;

            $coursesWithProgress[] = [
                'course' => $course,
                'progress' => $progress
            ];
        }

        return $coursesWithProgress;
    }
}
