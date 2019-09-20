<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetsController extends Controller{

    public function index() {
        //Default if page is called. Displays nothing
    }

    /*
    This function deletes a pet. This function takes in user id but doesn't use it within the function. Removed

    Refactoring: DB::table('pets')->where('id', $petId)->delete();

    Returns: Null

    
    */
    public function deletePetById($petId) {
        Pet::destroy($petId);
        return null;
    }

    
    
    /*
    Extra functions not yet refactored


    public function getById($petid) {
        $pet = DB::table('pets')->where('id', $petid)->get();
        return $pet;
    }

    public function deleteById($petid){
        DB::table('pets')->where('id', $petId)->delete();
        return null;
    }

    public function getPetsbyUserId($userId){
        $pets = DB::table('pets')->where('user_id', $userId)->get();
        return $pets;
    }
    */
}