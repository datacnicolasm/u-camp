<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GroupInvitationLink extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'group_id', 'invitation_key', 'expires_at'];

    // Relación con el modelo User (usuario que creó el enlace)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Group (grupo al que pertenece el enlace)
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // Generar un nuevo enlace de invitación
    public static function generate(User $user, Group $group, $expiresAt = null)
    {
        return self::create([
            'user_id' => $user->id,
            'group_id' => $group->id,
            'invitation_key' => Str::uuid(), // Generar una clave única
            'expires_at' => $expiresAt ?: Carbon::now()->addMonth(), // Vigencia de 1 mes por defecto
        ]);
    }

    // Validar si el enlace es válido
    public function isValid()
    {
        return Carbon::parse($this->expires_at)->isFuture();
    }
}