<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'color',
        'user_id'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    static function getGroupsUser(User $user){
        
        $groups = Group::where('user_id', $user->id)->withCount('users')->get();

        return $groups;
    }

    /**
     * Get the user that owns the group.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
