<?php
 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
 

Route::get('/v1/users', 'UsersController@joinAllUsersDisplayName');
 
Route::get('/v1/users/{id}', 'UsersController@getUserById');
 
Route::get('/v1/users/{id}/pets', 'UsersController@getPetsFavFood');
 
Route::post('/v1/users', 'UsersController@postUserRequest');

Route::delete('/v1/users/{id}/pets/{id}', 'UsersController@deletePetById');


