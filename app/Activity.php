<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    protected $appends = ['modeltype'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getModeltypeAttribute()
    {
        return $this->attributes['modeltype'] = 'activity';
    }
}
