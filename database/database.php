<?php
 
use Illuminate\Support\Facades\DB;
 
DB::table('users')->insert([
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'contact_number' => $request->contact_number,
        'disabled' => false,
    ]);
 