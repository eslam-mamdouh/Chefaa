<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
class searchCheapes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:search-cheapest {product_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'takes product id and returns cheapest 5 pharmacies';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $product_id = $this->argument('product_id');

        $pharmacies =  product::join('pharmacy_products as pp' , 'pp.product_id','=' , 'products.id')
                        ->join('pharmacies as ph' , 'pp.pharmacy_id','=','ph.id')
                        ->select('ph.id','ph.name','pp.price')
                        ->where('products.id',$product_id)
                        ->orderBy('pp.price' ,'asc')
                        ->take(5)
                        ->get()
                        ->makeHidden(['lowest_price' , 'quantity'])
                        ->toArray();

        if ($pharmacies) {

            $this->newLine();
            $this->info('Cheapest 5 Pharmacies : ');
            $this->table(
                ['ID','Pharmacy', 'Price'],
                $pharmacies
            );
        }else{
            $this->newLine();
            $this->error("The Product : ".$product_id ." doesn't exist. ");
        }                        

        $this->newLine();
        $this->info('The command was successful!');
    }
}
