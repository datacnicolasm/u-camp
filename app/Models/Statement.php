<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'entry_id',
        'workshop_id'
    ];

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
    
}
