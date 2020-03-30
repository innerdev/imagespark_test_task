<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexPageTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexPageWithUsersIsOpening()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Search your user!');
    }
}
