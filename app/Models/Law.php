<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Law extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_law',
        'title_law',
        'num_law',
        'type_law',
        'text_law'
    ];

    /**
     * The workshops that belong to the law.
     */
    public function workshops()
    {
        return $this->belongsToMany(Workshop::class);
    }
}
