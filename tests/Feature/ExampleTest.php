<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->post_test();
        $this->get_test();





        
    }
    public function get_test()
    {
        $response = $this->get('http://127.0.0.1:8000/api/Artikel');

        $response->assertStatus(200);
        print_r($response->content());

    }
    public function post_test()
    {
        $response = $this->post("http://127.0.0.1:8000/api/Artikel?name=312312&prijs=12312&BoodschappenlijstId=1");
        //201 = Created

        $response->assertStatus(201);

    }


}
