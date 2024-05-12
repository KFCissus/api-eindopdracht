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
        $this->create_klant_test();
        $this->create_artikel_test();
        $this->read_artikel_test();
        $this->read_klant_test();
        $this->delete_artikel_test();
        $this->delete_klant_test();
    }

    public function read_klant_test()
    {
        $response = $this->get('http://127.0.0.1:8000/api/klant');

        $response->assertStatus(200);
        print_r($response->content());

    }
    public function read_artikel_test()
    {
        $response = $this->get('http://127.0.0.1:8000/api/Artikel');

        $response->assertStatus(200);
        print_r($response->content());

    }
    public function delete_artikel_test()
    {
        $response = $this->delete("http://127.0.0.1:8000/api/Artikel?name=312312&prijs=12312&BoodschappenlijstId=1");

        $response->assertStatus(204);
        print_r($response->content());
    }
    public function delete_klant_test()
    {
        $response = $this->delete("http://127.0.0.1:8000/api/Klant?name=hallo");

        $response->assertStatus(204);
        print_r($response->content());
    }
    public function create_artikel_test()
    {
        $response = $this->post("http://127.0.0.1:8000/api/Artikel?name=312312&prijs=12312&BoodschappenlijstId=1");
        //201 = Created

        $response->assertStatus(201);
        print_r($response->content());

    }
    public function create_klant_test()
    {
        $response = $this->post("http://127.0.0.1:8000/api/Klant?name=hallo");
        //201 = Created

        $response->assertStatus(201);
        print_r($response->content());

    }

}
