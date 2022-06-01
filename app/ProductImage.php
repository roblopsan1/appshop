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
}
