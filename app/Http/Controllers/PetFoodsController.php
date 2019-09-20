<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetFood;

class PetFoodsController extends Controller{

    public function index() {
        //Default if page is called. Displays nothing
    }

    /*
    This function is to get the pets favourite food by pet id

    Refactoring: $fav_food = DB::table('pet_foods')->where('pet_id', $petId)->get();

    Returns: An array of fav foods of a pet
    */
    public function getPetFavFoodById($petId){
        $pet = Pet::find($petId);
        $fav_food = $pet->favorite_foods;
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
}