<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class KlantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $klant_id;
    public function test_example()
    {
        $this->create_klant_test();
         $this->read_klant_test();
        $this->delete_klant_test();

    }

    public function create_klant_test()
    {
        Sanctum::actingAs(User::factory()->create(),['*']);

        $response = $this->post("http://127.0.0.1:8000/api/register?name=chris&email=chriss@email.com&password=12345678&password_confirmation=12345678");
        $this->klant_id =  json_decode( $response->content(),true)['id'];

        //201 = Created

        $response->assertStatus(200);
        print_r($response->content());


    }
    public function read_klant_test()
    {
        Sanctum::actingAs(User::factory()->create(),['*']);
        $response = $this->get('http://127.0.0.1:8000/api/Klant');

        $response->assertStatus(200);
        print_r($response->content());

    }

    public function delete_klant_test()
    {
        Sanctum::actingAs(User::factory()->create(),['*']);


        $response = $this->delete("http://127.0.0.1:8000/api/Klant/".$this->klant_id);

        $response->assertStatus(200);
        print_r($response->content());
    }
}
