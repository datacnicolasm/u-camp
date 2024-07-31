<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_eeff',
        'type_group',
        'sub_type_group',
        'name_es',
        'name_en'
    ];

    public function statements()
    {
        return $this->hasMany(Statement::class);
    }
}
