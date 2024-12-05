<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = ['nombre', 'nivel_agua', 'bomba_id'];

    protected $table = 'sensores';
    
    public function bomba()
    {
        return $this->belongsTo(Bomba::class);
    }

}
