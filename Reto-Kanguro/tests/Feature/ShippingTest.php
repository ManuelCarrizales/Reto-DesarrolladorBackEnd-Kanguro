<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShippingTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_post_can_be_created()
    {
        $this->seed();

        $response = $this->post('/api/create_shipping',[
            'user_id' => '1',
            'origen' => 'Ciudad Madero',
            'destino' => 'Ciudad Victoria',
            'parcel_id' => 1,
            'status_id' => 1
        ]);

        $response->assertOk();
    }
}
