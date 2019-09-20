<?php
 /* This file defines the model for the User class */
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    //Added connection to the Pet model
    public function pet() {
        return $this->hasMany('App\Pet');
    }

}
