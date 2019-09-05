<?php 
/*This function is to get the favourite food of all pets by their respective IDs
Changes:
-Replaced getUser with getUserById from database file 
-Moved get pets by user ID DB request to database.php
*/

include "database/database.php";

Route::get('/v1/users/{id}/pets', function($id) {
    $user = getUserById($id);
    $pets = [];

    if ($user != null) {
        $pets = getPetsByUserId($user->id);
        if (count($pets) > 0) {
            foreach ($pets as $pet) {
                $pet->favourite_foods = getPetFavFoodById($pet->id);
            }
        }
    }
    return $pets;
});

