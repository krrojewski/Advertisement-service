<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model // model do obiektu
{
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
