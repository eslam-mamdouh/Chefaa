<?php

namespace App\Repositories;   

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Pharmacy;


class PharmacyRepository extends BaseRepository
{     

       /**
    * ClientRepository constructor.
    *
    * @param Pharmacy $model
    */

    public function __construct(Pharmacy $model)
    {
 
        parent::__construct($model);
    }
 

}