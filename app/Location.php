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
}
