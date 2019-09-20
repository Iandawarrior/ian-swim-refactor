<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetsController extends Controller{

    public function index() {
        //Default if page is called. Displays nothing
    }

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

    public function getPetFavFoodById($petId){
        $fav_food = DB::table('pet_foods')->where('pet_id', $petId)->get();
        return $fav_food;
    }

    /*
    This function is to get the favourite food of all pets by their respective IDs
    Returns: A list of pets with favourite food stored
    */
    public function getPetsFavFood($id) {
        $user = null;
        $pets = [];
        
        $users = DB::table('users')->where('id', $id)->get();
        if (count($users) > 0) {
            $user = $users[0];
        }
        
     
        if ($user != null) {
            $pets = DB::table('pets')->where('user_id', $user->id)->get();
            if (count($pets) > 0) {
                foreach ($pets as $pet) {
                    $pet->favourite_foods = DB::table('pet_foods')->where('pet_id', $pet->id)->get();
                }
            }
        }
     
        return $pets;
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