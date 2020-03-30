<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    private const API_PREFIX = "api";

    private const USER_ID = 1;
    private const USER_FIRST_NAME = "Ivanov";
    private const USER_CITY_NAME = "Moscow";

    public function testGetAllUsers()
    {
        $users = User::with('city')->get()->toJson();
        $response = $this->get(self::API_PREFIX . '/users');
        $response->assertStatus(200);
        $this->assertEquals($users, $response->getContent());
    }

    public function testGetExactUser()
    {
        $users = User::where('id', self::USER_ID)->with('city')->get()->toJson();
        $response = $this->get(self::API_PREFIX . '/users/name/' . self::USER_FIRST_NAME);
        $response->assertStatus(200);
        $this->assertEquals($users, $response->getContent());
    }

    public function testGetExactUserWithCity()
    {
        $users = User::where('id', self::USER_ID)->with('city')->get()->toJson();
        $response = $this->get(self::API_PREFIX . '/users/name/' . self::USER_FIRST_NAME . '/city/' . self::USER_CITY_NAME);
        $response->assertStatus(200);
        $this->assertEquals($users, $response->getContent());
    }
}
