<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Pharmacy;
class PharmacyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pharmacies = Pharmacy::all();
        $products = Product::all();
        $pharmacies->each(function ($pharmacy) use ($products) { 
            $data = [];
            $products = $products->random(rand(1 , 5))->pluck('id')->toArray();
            foreach ($products as $key => $id) {
                $data[] = [
                    'product_id' => $id,
                    'price'=> rand(20 , 1000),
                    'quantity' => rand(0 , 30)
                ];
            }
            $pharmacy->products()->attach($data);
        });
    }
}
