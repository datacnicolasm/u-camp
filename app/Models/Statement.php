<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

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

    static public function createStatementDefault(Workshop $workshop)
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/statements_default.json');
        
        $json = File::get($jsonPath);
        $items = json_decode($json, true);

        // Crear instancias de RutaProfesional a partir de los datos JSON
        foreach ($items as $item) {
            Statement::create([
                'value' => $item['value'],
                'entry_id' => $item['entry_id'],
                'workshop_id' => $workshop->id
            ]);
        }

        $statementEntry = Statement::where('workshop_id', $workshop->id)
                ->get();

        return $statementEntry;
    }
    
}
