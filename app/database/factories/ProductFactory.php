<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        Storage::fake('local');
        // $image = UploadedFile::fake()->create('pro-image'.rand(90000 , 10000).'.png');
        return [
            'title' => 'Product ' . fake()->name(),
            'description' => fake()->text(),
            // 'image' => $image,
        ];
    }
}
