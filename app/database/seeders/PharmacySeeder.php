<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pharmacy;
class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pharmacies = Pharmacy::factory()->count(50000)->make();
        $chunks = $pharmacies->chunk(5000);

        $chunks->each(function($chunk){
            Pharmacy::insert($chunk->toArray());
        });
    }
}
