<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Club extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

}
