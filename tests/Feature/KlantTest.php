<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KlantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get_test();

    }
    public function get_test()
    {
        $response = $this->get('http://127.0.0.1:8000/api/Klant');

        $response->assertStatus(200);
    }
}
