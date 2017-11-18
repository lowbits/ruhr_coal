<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function locations()
    {
        return $this->belongsToMany(Location::class)->withTimestamps();
    }
}
