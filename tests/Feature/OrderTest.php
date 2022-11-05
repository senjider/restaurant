<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * test create order proccess.
     *
     * @return void
     */
    public function testCreateOrder()
    {
        $data  = [
            'products' => [
                [
                    'product_id' => 1,
                    'quantity' => 2
                ],
                [
                    'product_id' => 2, //not existing product
                    'quantity' => 2
                ],
                [
                    'product_id' => 'aa',
                    'quantity' => 2
                ],
                [
                    'product_id' => 2
                ],
                [
                    'quantity' => 2
                ]
            ]
        ];
        $response = $this->json('POST', '/make-order', $data);
        $response->assertStatus(200);
        $response->assertJson(['status'        => true]);
        $response->assertJson(['message'       => "Order Created!"]);
    }
}
