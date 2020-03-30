<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends BaseController
{
    private const USERS_PER_PAGE = 10;

    public function index(Request $request)
    {
        $name = $request->get('name');
        $cityId = $request->get('city_id');

        $users = User::withName($name)->withCityId($cityId)->paginate(self::USERS_PER_PAGE);

        return view('index', [
            'users' => $users,
            'cities' => City::forSelectBox(),
        ]);
    }
}
