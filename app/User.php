<?php
 /* This file defiens the model for the User class */
use Illuminate\Database\Eloquent\Model;

class User extends Model {

    public function pet() {
        return $this->hasMany('App\Pet');
    }

}
