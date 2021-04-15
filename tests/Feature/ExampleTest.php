<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic airport fetching api.
     * @test
     * @return void
     */
    public function airportFetchApiTest()
    {
        $response = $this->json('get', 'api/airports');
        $response->assertStatus(200);
    }

    /**
     * A basic airport fetching api.
     * @test
     * @return void
     */
    public function tripbuilderFetchApiTest()
    {
        $response = $this->json('get', 'api/tripbuild',['start_date'=>'15-04-21', 'retun_date'=>'15-04-21','deperture_from'=>'YUL','arrival_from'=>'YVR','two_way'=>'true','airline'=>'false','by_price'=>'false','page'=>2]);
        $response->assertStatus(200);
    }

    /**
     * A basic airport fetching api.
     * @test
     * @return void
     */
    public function tripFetchApiTest()
    {
        $response = $this->json('get', 'api/individual/trip',['airline'=>'AC','number'=>303,'twoairline'=>'AC','twonumber'=>306,'two_way'=>true]);
        $response->assertStatus(200);
    }
}
