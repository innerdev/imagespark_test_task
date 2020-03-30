<?php

namespace App\Http\Controllers;

use App\Models\User;

class ApiController extends BaseController
{
    private const USERS_PER_PAGE = 10;

    public function getUsers()
    {
        return User::with('city')->get();
    }

    public function getUsersByName($name)
    {
        return User::with('city')->withName($name)->get();
    }

    public function getUsersByNameAndCity($name, $cityName)
    {
        return User::with('city')->withName($name)->withCityName($cityName)->get();
    }
}
