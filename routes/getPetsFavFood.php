<?php 
include "getUserById.php";

Route::get('/v1/users/{id}/pets', function($id) {
    $user = getUser($id);
    $pets = [];
    

    if ($user != null) {
        $pets = DB::table('pets')->where('user_id', $user->id)->get();
        if (count($pets) > 0) {
            foreach ($pets as $pet) {
                $pet->favourite_foods = DB::table('pet_foods')->where('pet_id', $pet->id)->get();
            }
        }
    }
    return $pets;
});

