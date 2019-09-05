<?php
/*This function focuses on getting a user by ID
Returns: User
Changes:
-Moved DB get request to database.php file
*/
include "database/database.php";

Route::get('/v1/users/{id}', function($id) {
    $user = getUserById($id);
    return $user;
});