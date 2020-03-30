<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WebController@index');
Route::get('/search', 'WebController@search');

