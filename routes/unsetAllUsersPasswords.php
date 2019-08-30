<?php

Route::get('/v1/users', function() {
    $users = DB::table('users')->get();
    foreach ($users as $user) {
        unset($user->password);
    }
    return $users;
});