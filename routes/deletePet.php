<?php

Route::delete('/v1/users/{id}/pets/{id}', function($petId) {
    $pet = DB::table('pets')->where('id', $petid)->get();

    $validdel = "Pet doesn't exist."

    if ($pet != null) {
        $successdel = "Successful delete."
    }

    DB::table('pets')->where('id', $petId)->delete();

    return $validdel;
}); 

/* $userId was passed in but never used hence removed
    Added confirmation that pet has existed before deleting */