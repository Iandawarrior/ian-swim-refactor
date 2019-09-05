<?php
/*This function deletes a pet
Changes:
-$userId was passed in but never used hence removed
-Added confirmation that pet exists before deleting */
include "database/database.php";


Route::delete('/v1/users/{id}/pets/{id}', function($petId) {
    //Check if pet exists
    $pet = getPetById($petID)
    if ($pet != null) {
        deletePetById($petID);
        echo "Successful delete.";
    } else {
        echo "Pet doesn't exist";
    }

    return null;
}); 