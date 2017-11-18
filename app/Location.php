<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class)->withTimestamps();
    }
}
