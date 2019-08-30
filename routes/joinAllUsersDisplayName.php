<?php

Route::get('/v1/users', function() {
    $users = DB::table('users')->get();
    foreach ($users as $user) {
        $user->display_name = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
    }
    return $users;
});