<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUpdateStock()
    {
        $data  = [
                    [
                        'product_id' => 1,
                        'quantity' => 2
                     ],[
                        'product_id' => 100, //not existing product
                        'quantity' => 2
                    ]
                ];

        foreach ($data as $item){
            $response = $this->json('POST', '/update-stock', $item);
            $response->assertStatus(200);
            $response->assertJson(['status'        => true]);
            $response->assertJson(['message'       => "Update stock done"]);
        }
    }
}
