<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchPageTest extends TestCase
{
    use RefreshDatabase;

    private const FIST_NAME_TO_FIND = "Vasya";
    private const FIST_AND_MIDDLE_NAME_TO_FIND = "Vasya Vasilievich";
    private const FULL_NAME_TO_FIND = "Vasya Vasilievich Ivanov";
    private const FULL_NAME_TO_FIND_REVERSED = "Vasya Vasilievich Ivanov";
    private const CITY_ID_TO_FIND = 1;
    private const SHOULD_SEE_NAME = "Ivanov";
    private const SHOULD_NOT_SEE_NAME = "Petrov";

    public function testFindUserByFirstName()
    {
        $response = $this->get('/?name=' . self::FIST_NAME_TO_FIND);
        $response->assertStatus(200);
        $response->assertSeeText(self::SHOULD_SEE_NAME);
        $response->assertDontSeeText(self::SHOULD_NOT_SEE_NAME);
    }

    public function testFindUserByFirstAndMiddleName()
    {
        $response = $this->get('/?name=' . self::FIST_AND_MIDDLE_NAME_TO_FIND);
        $response->assertStatus(200);
        $response->assertSeeText(self::SHOULD_SEE_NAME);
        $response->assertDontSeeText(self::SHOULD_NOT_SEE_NAME);
    }

    public function testFindUserByFullName()
    {
        $response = $this->get('/?name=' . self::FULL_NAME_TO_FIND);
        $response->assertStatus(200);
        $response->assertSeeText(self::SHOULD_SEE_NAME);
        $response->assertDontSeeText(self::SHOULD_NOT_SEE_NAME);
    }

    public function testFindUserByFullNameReversed()
    {
        $response = $this->get('/?name=' . self::FULL_NAME_TO_FIND_REVERSED);
        $response->assertStatus(200);
        $response->assertSeeText(self::SHOULD_SEE_NAME);
        $response->assertDontSeeText(self::SHOULD_NOT_SEE_NAME);
    }

    public function testFindUserByCityId()
    {
        $response = $this->get('/?city_id=' . self::CITY_ID_TO_FIND);
        $response->assertStatus(200);
        $response->assertSeeText(self::SHOULD_SEE_NAME);
        $response->assertDontSeeText(self::SHOULD_NOT_SEE_NAME);
    }

    public function testFindUserByFullNameAndCityId()
    {
        $response = $this->get('/?name=' . self::FULL_NAME_TO_FIND . '&city_id=' . self::CITY_ID_TO_FIND);
        $response->assertStatus(200);
        $response->assertSeeText(self::SHOULD_SEE_NAME);
        $response->assertDontSeeText(self::SHOULD_NOT_SEE_NAME);
    }
}
