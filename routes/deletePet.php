<?php

Route::delete('/v1/users/{id}/pets/{id}', function($userId, $petId) {
    DB::table('pets')->where('id', $petId)->delete();
    return null;
});