<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test the hello endpoint returns proper Arabic greeting.
     *
     * @return void
     */
    public function test_hello_endpoint_returns_arabic_greeting()
    {
        $response = $this->get('/hello');

        $response->assertStatus(200)
                 ->assertJson(['message' => 'مرحبا']);
    }

    /**
     * Test the hello page view displays correctly.
     *
     * @return void
     */
    public function test_hello_page_displays_correctly()
    {
        $response = $this->get('/hello-page');

        $response->assertStatus(200)
                 ->assertSee('مرحبا')
                 ->assertSee('أهلاً وسهلاً بك في ويلو ويب')
                 ->assertSee('العودة للرئيسية');
    }
}
