<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkshopEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_input',
        'cod_input',
        'verify_value',
        'userworkshop_id'
    ];

    public function userworkshop()
    {
        return $this->belongsTo(UserWorkshop::class);
    }
}
