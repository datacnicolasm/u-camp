<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'points',
        'activity_type'
    ];

    public static function completeLesson(User $user, Lesson $lesson, String $activity_type)
    {
        // Verificar si ya existe un registro de puntos para esta lección y usuario
        $existingPoint = self::where('user_id', $user->id)
            ->where('lesson_id', $lesson->id)
            ->first();

        if (!$existingPoint) {
            // Crear el registro de puntos si no existe
            self::create([
                'user_id' => $user->id,
                'lesson_id' => $lesson->id,
                'points' => $lesson->points_xp,
                'activity_type' => $activity_type
            ]);
        }
    }

    public static function getDailyPoints(User $user)
    {
        return Point::where('user_id', $user->id)
            ->selectRaw('DATE(created_at) as date, SUM(points) as total_points')
            ->groupBy('date')
            ->get();
    }

    public static function getTotalPoints(User $user)
    {
        return Point::where('user_id', $user->id)->sum('points');
    }

    public static function getConsecutiveDays(User $user)
    {
        $points = Point::getDailyPoints($user);

        $consecutive_days = 0;
        $previous_date = null;

        foreach ($points as $point) {
            if ($previous_date) {
                $diff = $previous_date->diffInDays($point->date);
                if ($diff == 1) {
                    $consecutive_days++;
                } else {
                    $consecutive_days = 1;
                }
            } else {
                $consecutive_days = 1;
            }

            $previous_date = $point->date;
        }

        return $consecutive_days;
    }

    public static function getPointsToday(User $user)
    {
        return self::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->sum('points');
    }

    public static function getPointsOfWeek(User $user)
    {
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY);

        // Obtener los puntos de la semana actual para el usuario
        $points = self::where('user_id', $user->id)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(points) as total_points'))
            ->groupBy('date')
            ->get()
            ->keyBy('date')
            ->toArray();

        // Crear una matriz con los días de la semana y sus puntos
        $pointsOfWeek = [];
        for ($date = $startOfWeek; $date->lte($endOfWeek); $date->addDay()) {
            $dayName = $date->format('l');
            $pointsOfWeek[] = [
                'day' => $dayName,
                'points' => $points[$date->format('Y-m-d')]['total_points'] ?? 0
            ];
        }

        return $pointsOfWeek;
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
