<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Subscription extends Model {


    function student() {
        return $this->belongsTo('App\Student');
    }

}