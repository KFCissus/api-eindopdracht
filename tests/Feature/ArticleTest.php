<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    private $id_delete = 0 ;
    public function test_example()
    {


        $this->create_artikel_test();
        $this->read_artikel_test();
        $this->delete_artikel_test();

    }


    public function read_artikel_test()
    {
        Sanctum::actingAs(User::factory()->create(),['*']);

        $response = $this->get('http://127.0.0.1:8000/api/artikel');

        $response->assertStatus(200);
        print_r($response->content());

    }


    public function create_artikel_test()
    {
        Sanctum::actingAs(User::factory()->create(),['*']);

        $response = $this->post("http://127.0.0.1:8000/api/artikel?name=test&prijs=12312&BoodschappenlijstId=1&id=100");
        //201 = Created
       $this->id_delete =  json_decode( $response->content(),true)['id'];

        $response->assertStatus(201);
        print_r($response->content());


    }
    public function delete_artikel_test()
{
    Sanctum::actingAs(User::factory()->create(),['*']);

    $response = $this->delete("http://127.0.0.1:8000/api/artikel/".$this->id_delete);

    $response->assertStatus(200);
    print_r($response->content());
    print_r($this->id_delete);
}


}
