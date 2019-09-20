<?php
/* This file defines the model for the Pet_Food class. Timestamps turned off to ensure no storage of 
   unnecesary data */

use Illuminate\Database\Eloquent\Model;

class PetFood extends Model {

    public $timestamps = false;

    //Added connection to pet model
    public function pet() {
        return $this->belongsTo('App\Pet');
    }

}