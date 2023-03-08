<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_login_route_works(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_the_register_route_works(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

}
