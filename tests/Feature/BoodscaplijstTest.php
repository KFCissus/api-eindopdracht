<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class BoodscaplijstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->read_Boodscaplijst_test();
    }

    public function read_Boodscaplijst_test()
    {
        Sanctum::actingAs(User::factory()->create(),['*']);

        $response = $this->get('http://127.0.0.1:8000/api/Boodschaplijst');


        $response->assertStatus(200);
        print_r($response->content());

    }




}
