<?php

namespace App\Repositories;   

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;



class BaseRepository
{     

     protected $model;       

    
    public function __construct(Model $model)     
    {         
        $this->model = $model;

    }
 
    public function getAll()
    {
        return $this->model->orderBy('id' , 'desc')->paginate(20);
    }

    public function paginate($num)
    {
        return $this->model->paginate($num);
    }
  
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update($id , array $attributes): Model
    {
        $this->model->find($id)->update($attributes);
        return $this->model;
    }

    public function find($id): ? Model
    {
        return $this->model->find($id);
    }

    public function with(...$rel)
    {
        return $this->model->with(...$rel);
    }

    public function select($data)
    {
        return $this->model->select($data);
    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

    public function where(...$prams)
    {
        return $this->model->where(...$prams);
    }

    public function get(): ? Collection
    {
        return $this->model->get();
    }

    public function join(...$attr)
    {
        return $this->model->join(...$attr);
    }

    public function groupBy(...$cols)
    {
        return $this->model->groupBy(...$cols);
    }

    public function orderBy(...$cols)
    {
        return $this->model->orderBy(...$cols);
    }

    public function first()
    {
        return $this->model->first();
    }

    public function latest()
    {
        return $this->model->latest();
    }

    public function limit($number)
    {
        return $this->model->limit($number);
    }

    
    



    
}


?>