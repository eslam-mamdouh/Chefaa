<?php

namespace App\Services;
use App\Repositories\ProductRepository;
use App\Services\BaseService;

class ProductService extends BaseService{


    /**
     * @var $productRepository
     */

     protected $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        
        parent::__construct($productRepository);
    }


    public function searchByName($words)
    {
        return $this->where('title' , 'like' , '%'.$words.'%')->paginate(30);
    }

    public function productWithPharmacies($id)
    {
        return $this->with('pharmacies')
                    ->where('products.id',$id)->paginate(30);
        
    }



}





?>
