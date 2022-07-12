<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function toArray($request)
    {
        return [
            'data'=> parent::toArray($request)
        ];
    }


    public function with($request)
    {
        return [
            'success' =>  true,
            'message' => ''
        ];
    }
}
