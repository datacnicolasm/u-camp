<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'int_errores',
        'int_aciertos',
        'int_null',
        'user_id',
        'workshop_id'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
