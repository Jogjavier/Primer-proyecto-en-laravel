<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    public function bomba()
    {
        return $this->belongsTo(Bomba::class);
    }

}
