<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Bomba extends Model
{
    use Searchable;

    protected $fillable = ['nombre', 'estado', 'imagen'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'estado' => $this->estado ? 'Encendida' : 'Apagada',
        ];
    }
}
