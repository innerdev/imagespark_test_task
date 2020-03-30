<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /*
        We actually almost have no business logic in this project.
        Let's test User scope 'scopeWithName', because it contains a bit of logic.
     */

    private const USER_NAME_SIMPLE = "Ivanov";
    private const USER_NAME_COMPLEX = "Ivanov Ivan Ivanovich Ivanovsky";
    private const USER_NAME_NOT_EXISTS = "some random string";

    public function testUserHasCityRelationWorks()
    {
        $user = User::with('city')->where('id', 1)->first();
        $this->assertNotNull($user->city);
    }

    public function testUserCanBeFoundBySimpleName()
    {
        $user = User::withName(self::USER_NAME_SIMPLE)->first();
        $this->assertNotNull($user);
    }

    public function testUserCanBeFoundByComplexName()
    {
        $user = User::withName(self::USER_NAME_COMPLEX)->first();
        $this->assertNotNull($user);
    }

    public function testNotExistingUserSearch()
    {
        $user = User::withName(self::USER_NAME_NOT_EXISTS)->first();
        $this->assertNull($user);
    }
}
