<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetFood;

class PetFoodsController extends Controller{

    public function index() {
        //Default if page is called. Displays nothing
    }

    /*
    This function is to get the favourite food of all pets by their respective IDs

    Refactoring: $users = DB::table('users')->where('id', $id)->get();
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
                
    Returns: A list of pets with favourite food stored
    */
    public function createPetsFavFood($id) {
        $user = User::find($id);
        $pets = [];

        if ($user != null) {
            $pets = Pet::where('user_id', $user->id)->get();
            if (count($pets) > 0) {
                foreach ($pets as $pet) {
                    $pet->favourite_foods = PetFood::where('pet_id', $pet->id)->get();
                }
            }
        }
     
        return $pets;
    }
}