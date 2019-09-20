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

class User extends Eloquent {

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

    public function insertUserRequest($request){
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


    public function getUsersByEmail($email){
        $users = DB::table('users')->where('email', $email)->get();
        return $users;
    }


    public function getUserById($id) {
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

    public function getAllUsers(){
        $users = DB::table('users')->get();
        return $users;
    }
}
