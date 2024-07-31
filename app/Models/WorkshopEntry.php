<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_input',
        'cod_input',
        'workshop_id'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
