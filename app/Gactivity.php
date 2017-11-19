<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gactivity extends Model
{
    protected $guarded = [];

    protected $appends = ['modeltype'];

    public function participants(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);

    }

    public function getModeltypeAttribute()
    {
        return $this->attributes['modeltype'] = 'gactivity';
    }
}
