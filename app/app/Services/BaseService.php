<?php


namespace App\Services;
use App\Repositories\BaseRepository;

class BaseService{


    /**
     * @var $BaseRepository
     */

     protected $BaseRepository;


     public function __construct(BaseRepository $BaseRepository)
     {
         $this->BaseRepository = $BaseRepository;
     }

     public function getAll()
     {

         return $this->BaseRepository->getAll();
     }

     public function get()
     {

         return $this->BaseRepository->get();
     }

     public function select(...$prams)
     {

         return $this->BaseRepository->select(...$prams);
     }

     public function first()
     {

         return $this->BaseRepository->first();
     }

     public function paginate($count)
     {

         return $this->BaseRepository->paginate($count);
     }

     public function create($data)
     {

         return $this->BaseRepository->create($data);
     }

     public function find($id)
     {

         return $this->BaseRepository->find($id);
     }

     public function where(...$prams)
     {

         return $this->BaseRepository->where(...$prams);
     }

     public function orderBy(...$attr)
     {

         return $this->BaseRepository->orderBy(...$attr);
     }

     public function with(...$rel)
     {

         return $this->BaseRepository->with(...$rel);
     }


     public function join(...$attr)
     {

         return $this->BaseRepository->join(...$attr);
     }
     

     public function update($id , $data)
     {

         return $this->BaseRepository->update($id , $data);
     }


     public function delete($id)
     {

         $model = $this->BaseRepository->delete($id);
         return $model;
          
     }

}








?>