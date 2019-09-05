<?php
/*This function posts a user's request after validation
Returns: Null
Changes:
-Moved insert db request to database.php and replaced with insertUserRequest function
-Moved get users by email DB request to database.php and replaced with getUserByEmail function
*/
include "database/database.php";

Route::post('/v1/users', function(Request $request) {
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

    insertUserRequest($request);
    
    $users = getUsersByEmail($request->email);
    
    if (count($users) > 0) {
        $user = $users[0];
        $user->login_date_formatted = $user->login_date->format('Y-m-d H:i:s'); 
        $user->create_date_formatted = $user->created_at->format('Y-m-d H:i:s'); 
        $user->update_date_formatted = $user->updated_at->format('Y-m-d H:i:s'); 
        return $user;
    }
 
    return null;
});
 