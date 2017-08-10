<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $fillable = ['name', 'grade', 'family_name'];


    function subscriptions() {
        return $this->hasMany('App\Subscription');
    }
    
}