<?php

namespace Tests\Unit;

use Tests\TestCase;

class PharmacyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_pharmacy_create()
    {
        $data = [
            'name'=>"Pharm",
            'address'=>"sa",
        ];

        $response = $this->post("/pharmacies" , $data);
        $response->assertRedirect("/pharmacies");
    }
}
