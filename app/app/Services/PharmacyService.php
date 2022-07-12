<?php


namespace App\Services;
use App\Repositories\PharmacyRepository;
use App\Services\BaseService;

class PharmacyService extends BaseService{


    /**
     * @var $pharmacyRepository
     */

     protected $pharmacyRepository;


     public function __construct(PharmacyRepository $pharmacyRepository)
   {

       parent::__construct($pharmacyRepository);
   }



}





?>
