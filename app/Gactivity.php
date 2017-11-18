<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gactivity extends Model
{
    public function participants(){
        return $this->belongsToMany(User::class);
    }

}
