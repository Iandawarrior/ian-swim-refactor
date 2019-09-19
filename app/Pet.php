<?php
/* This file stores all the connections to the database and provides functions for easier readability
    as all function names are pretty self explanatory
Changes:
-Added getter and deleter for pets by ID
-Added insert request for user
-Added get users by email
-Added get user by ID
-Added get all users
-Added get pets by user ID
-Added get pet fav food by pet ID
*/
use Illuminate\Support\Facades\DB;

class Pet extends Eloquent {

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

}