<?php
/*This function joins the user's first, middle and last name's with neat spacing
Changes:
-Moved get all users DB request to database.php file and replaced with getAllUsers() function
*/
include "database/database.php";


Route::get('/v1/users', function() {
    $users = getAllUsers;
    foreach ($users as $user) {
        $user->display_name = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
    }
    return $users;
});