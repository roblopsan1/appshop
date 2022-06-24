<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model

{
    //ProductImage -> producto
    public function product()
    {
        //Una imagen pertenece a un producto
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute()
    {
        if(substr($this->image, 0, 4) === "http"){
            return $this ->image;
        }
        return '/images/products/'.$this->image;
    }
}
