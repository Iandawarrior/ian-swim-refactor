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

    public function getPetById($petid) {
        $pet = DB::table('pets')->where('id', $petid)->get();
        return $pet;
    }

    public function deletePetById($petid){
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
}