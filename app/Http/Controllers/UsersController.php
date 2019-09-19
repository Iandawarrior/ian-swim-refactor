<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller{

    /*
    This function joins the user's first, middle and last name's with neat spacing

    Refactoring: public function joinAllUsersDisplayName() {
                    $users = DB::table('users')->get();
                    foreach ($users as $user) {
                        $user->display_name = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
                        unset($user->password);
                    }
                    return $users;
                }

    Returns: List of users with display name stored
    */
    public function createAllUsersDisplayName() {
        $users = User::all();
        foreach ($users as $user) {
            $user->display_name = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
            unset($user->password);
        }
        return $users;
    }

    /*
    This function focuses on getting a user by ID

    Refactoring: $users = DB::table('users')->where('id', $id)->get();

    Returns: A user
    */
    public function getUserById($id) {
        $user = User::find($id);
        return $user;
    }

    /*
    This function focuses the first user in the database. I only implemented this to maintain functionality of 
    the following snippit of code. 

     if (count($users) > 0) {
            $user = $users[0];
        }

    Returns: The first user
    */
    public function getFirstUser() {
        $users = User::find(1);
        return $user;
    }

    /*
    This function finds all the users via email

    Refactoring: $users = DB::table('users')->where('email', $email)->get();

    Returns: List of users
    */

    public function getUsersByEmail($email) {
        $users = User::find($email);
        return $user;
    }

     /*
    This function formats all the fields below into a specific format, the timestamps created by 
    laravel should contain the following fields.

    Refactoring: if (count($users) > 0) {
                        $user = $users[0];
                        $user->login_date_formatted = $user->login_date->format('Y-m-d H:i:s'); 
                        $user->create_date_formatted = $user->created_at->format('Y-m-d H:i:s'); 
                        $user->update_date_formatted = $user->updated_at->format('Y-m-d H:i:s'); 
                        return $user;
                    }

    Returns: User
    */

    public function formatTimestamps($user) {
        $user->login_date = $user->login_date->format('Y-m-d H:i:s'); 
        $user->created_at = $user->created_at->format('Y-m-d H:i:s'); 
        $user->updated_at = $user->updated_at->format('Y-m-d H:i:s'); 
        $user->save();
        return $user;
    }

    /*
    This function posts a user's request after validation
    Returns: Null
    */
    public function submit(Request $request) {
        if ($request->has('password')) {
            unset($request['password']);
        }
     
        if ($request->has('username')) {
            unset($request['username']);
        }
     
        if ($request->has('api_token')) {
            unset($request['api_token']);
        }
        
        $this->validate($request,[
            'first_name' => 'required|max:64',
            'middle_name' => 'max:64',
            'last_name' => 'required|max:64',
            'email' => 'required|unique:users|max:256',
        ]);

        $user = new User;       
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->contact_number = $request->input('contact_number');
        $user->disabled = $request->input(false);
        $user->save();
        
        return null;
    }

}