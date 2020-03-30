<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', 'ApiController@getUsers');

// I think those routes could also be like "/users?name=..." and "/users?name=...&city=..."
Route::get('/users/name/{name}', 'ApiController@getUsersByName');
Route::get('/users/name/{name}/city/{city_name}', 'ApiController@getUsersByNameAndCity');


