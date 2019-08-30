<?php

function getUser($id) {
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

Route::get('/v1/users/{id}', function($id) {
    getUser($id);
});