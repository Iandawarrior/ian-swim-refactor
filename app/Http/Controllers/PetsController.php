<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class UsersController extends Controller{

    public function index() {

    }

    
    
    /*
    This function deletes a pet
    Returns: Null
    This function takes in user id but doesn't use it within the function: Consider removing
    */
    public function deletePetById($userId, $petId) {
        //DB::table('pets')->where('id', $petId)->delete();
        Pet::deleteById($petId);
        return null;
    }
}