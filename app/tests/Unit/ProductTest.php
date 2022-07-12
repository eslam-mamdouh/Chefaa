<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_product_create_with_required_fields()
    {
        Storage::fake('local');
        $image = UploadedFile::fake()->create('pro-image.png');
        $data = [
            'title'=>"Product",
            'description'=>"Des for this product",
            'image'=>$image,
        ];

        $response = $this->post("/products" , $data);
        $response->assertRedirect("/products");
        
    }

    public function test_product_create_without_required_fields()
    {
        $data = [
            'title'=>"",
            'description'=>"",
            'image'=>"",
        ];

        $response = $this->post("/products" , $data);
        $response->assertRedirect("/");
    }

    public function test_product_update_without_Image()
    {
        Storage::fake('local');
        $image = UploadedFile::fake()->create('pro-image.png');
        $data = [
            'title'=>"Product",
            'description'=>"Des for this product",
            'image'=>$image,
        ];

        $prod = Product::create($data);
        
        $data['title'] = "Product Updated";
        unset($data['image']);
        $response = $this->put("/products/".$prod->id."" , $data);
        
        $response->assertRedirect("/products");

    }

    public function test_product_update_with_new_Image()
    {
        Storage::fake('local');
        $image = UploadedFile::fake()->create('pro-image.png');
        $data = [
            'title'=>"Product",
            'description'=>"Des for this product",
            'image'=>$image,
        ];

        $prod = Product::create($data);
        
        Storage::fake('local');
        $image = UploadedFile::fake()->create('pro-image.png');
        $data['image'] = $image;

        $response = $this->put("/products/".$prod->id."" , $data);
        
        $response->assertRedirect("/products");

    }

    public function test_product_update_with_missing_fields()
    {
        Storage::fake('local');
        $image = UploadedFile::fake()->create('pro-image.png');
        $data = [
            'title'=>"Product",
            'description'=>"Des for this product",
            'image'=>$image,
        ];

        $prod = Product::create($data);
        
        Storage::fake('local');
        $image = UploadedFile::fake()->create('pro-image.png');
        $data['title'] = "";
        $data['description'] = "";
        $data['image'] = $image;
        
        $response = $this->put("/products/".$prod->id , $data);
        
        $response->assertRedirect("/");

    }

    public function test_product_exists_delete()
    {

        Storage::fake('local');
        $image = UploadedFile::fake()->create('pro-image.png');
        $data = [
            'title'=>"Product",
            'description'=>"Des for this product",
            'image'=>$image,
        ];

        $prod = Product::create($data);

        $response = $this->delete("/products/".$prod->id);
        
        $response->assertRedirect("/products");
    }

    public function test_product_not_exists_delete()
    {
        $id = 151;
        $response = $this->delete("/products/".$id);
        
        $response->assertStatus(500);
    }

}

