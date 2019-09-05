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

function getPetById($petid) {
    $pet = DB::table('pets')->where('id', $petid)->get();
    return $pet;
}

function deletePetById($petid){
    DB::table('pets')->where('id', $petId)->delete();
    return null;
}


function insertUserRequest($request){
    DB::table('users')->insert([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'disabled' => false,
        ]);
    return null;
}


function getUsersByEmail($email){
    $users = DB::table('users')->where('email', $email)->get();
    return $users;
}


function getUserById($id) {
    $user = null;
    $users = DB::table('users')->where('id', $id)->get();
    if (count($users) > 0) {
        $user = $users[0];
    }
    /* id should be unique making the above check redundant, hence there shouldn't be a scenario where there 
     is more than one user with the same id, however, since I cannot see the actual table I will assume there 
     is a scenario where id is not unique
    */
 
    return $user;
}

function getAllUsers(){
    $users = DB::table('users')->get();
    return $users;
}

function getPetsbyUserId($userId){
    $pets = DB::table('pets')->where('user_id', $userId)->get();
    return $pets;
}

function getPetFavFoodById($petId){
    $fav_food = DB::table('pet_foods')->where('pet_id', $petId)->get();
    return $fav_food;
}