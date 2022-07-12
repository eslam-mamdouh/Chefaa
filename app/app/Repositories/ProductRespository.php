<?php

namespace App\Repositories;   

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductRepository extends BaseRepository
{     

       /**
    * ClientRepository constructor.
    *
    * @param Product $model
    */
    
    public function __construct(Product $model)
    {
 
        parent::__construct($model);
    }
 

}