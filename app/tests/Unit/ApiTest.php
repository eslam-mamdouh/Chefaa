<?php

namespace Tests\Unit;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_search_by_name()
    {
        \Artisan::call('db:seed');

        $data = ['words'=>"pro"];
        $response = $this->postJson("/api/products/search" , $data);
    
        $response->assertStatus(200)
                 ->assertJson(['success'=>true]);
    }

    public function test_product_details_show()
    {
        \Artisan::call('db:seed');

        $id = 1;
        $response = $this->getJson("/api/products/".$id );
    
        $response->assertStatus(200);
    }

}
