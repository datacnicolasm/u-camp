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
        return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id')->withTimestamps();
    }

    static function getGroupsUser(User $user)
    {

        $groups = Group::where('user_id', $user->id)->withCount('users')->get();

        return $groups;
    }

    static function getUsersGroups(User $user)
    {
        // Obtener los IDs de los grupos del usuario
        $groupIds = Group::where('user_id', $user->id)->pluck('id');

        // Obtener los usuarios únicos que pertenecen a estos grupos
        $users = User::whereHas('group', function ($query) use ($groupIds) {
            $query->whereIn('groups.id', $groupIds);
        })->distinct()->get();

        // Filtrar los grupos de cada usuario para incluir solo los del usuario especificado
        foreach ($users as $userItem) {
            $userItem->setRelation('group', $userItem->group->whereIn('id', $groupIds));
        }

        return $users;
    }

    /**
     * Get the user that owns the group.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    * 
    */
    public function invitationLinks()
    {
        return $this->hasMany(GroupInvitationLink::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
