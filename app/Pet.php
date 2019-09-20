<?php
/* This file defines the model for the Pet class. Timestamps turned off to ensure no storage of 
   unnecesary data */

use Illuminate\Database\Eloquent\Model;

class Pet extends Model {

    public $timestamps = false;

    //Added connection to the Pet model
    public function petfood() {
        return $this->hasMany('App\PetFood');  
    }

    //Added connection to the User model
    public function user() {
        return $this->hasOne('App\User');  
    }
}