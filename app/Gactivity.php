<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gactivity extends Model
{
    protected $guarded = [];

    public function participants(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);

    }


}
