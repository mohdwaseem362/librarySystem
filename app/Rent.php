<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{








    public function book(){

        return $this->hasOne('App\Book');
    }
}
