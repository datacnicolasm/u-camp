<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'email',
        'password',
        'first_name',
        'last_name',
        'type_user',
    ];
}
