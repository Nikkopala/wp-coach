<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Club;

class Team extends Model
{
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
