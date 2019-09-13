<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller{

    /*
    This function joins the user's first, middle and last name's with neat spacing
    Returns: List of users with display name stored
    */
    public function joinAllUsersDisplayName() {
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $user->display_name = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
            unset($user->password);
        }
        return $users;
    }

    /*
    This function focuses on getting a user by ID
    Returns: A user
    */
    public function getUserById($id) {
        $user = null;
        $users = DB::table('users')->where('id', $id)->get();
        if (count($users) > 0) {
            $user = $users[0];
        }
        return $user;
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
    This function posts a user's request after validation
    Returns: Null
    */
    public function postUserRequest(Request $request) {
        if ($request->has('password')) {
            unset($request['password']);
        }
     
        if ($request->has('username')) {
            unset($request['username']);
        }
     
        if ($request->has('api_token')) {
            unset($request['api_token']);
        }
     
        $request->validate([
            'first_name' => 'required|max:64',
            'middle_name' => 'max:64',
            'last_name' => 'required|max:64',
            'email' => 'required|unique:users|max:256',
        ]);
     
        DB::table('users')->insert([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'disabled' => false,
        ]);
     
        $users = DB::table('users')->where('email', $email)->get();
     
        if (count($users) > 0) {
            $user = $users[0];
            $user->login_date_formatted = $user->login_date->format('Y-m-d H:i:s'); 
            $user->create_date_formatted = $user->created_at->format('Y-m-d H:i:s'); 
            $user->update_date_formatted = $user->updated_at->format('Y-m-d H:i:s'); 
            return $user;
        }
     
        return null;
    }

    /*
    This function deletes a pet
    Returns: Null
    This delete function takes in user id but doesn't use it within the function
    */
    public function deletePetById($userId, $petId) {
        DB::table('pets')->where('id', $petId)->delete();
        return null;
    }
}