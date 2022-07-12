<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Traits\Imagable;
class Product extends Model
{
    use HasFactory;
    use Imagable;

    protected $guarded = [];


    
    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class, 'pharmacy_products')->withPivot('price','quantity');
    }


    protected function lowestPrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->pharmacies()->min('price'),
        );
    }

    protected function quantity(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->pharmacies()->sum('quantity'),
        );
    }

}
