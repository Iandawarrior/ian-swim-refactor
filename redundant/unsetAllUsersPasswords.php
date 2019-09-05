<?php
/*This function unsets all the passwords of all the users locally, the passwords are still safe in the DB
Returns: A list of users with passwords unset
Changes:
-Moved get all Users db request to database.php file and replaced with getAllUsers() function
*/
include "database/database.php";

Route::get('/v1/users', function() {
    $users = getAllUsers();
    foreach ($users as $user) {
        unset($user->password);
    }
    return $users;
});