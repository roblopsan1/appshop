<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    //$product->categoria


    public function category(){
    //UN producto pertenece a una categoria
        return $this->belongsTo(Category::class);

    }

    public function images(){
        //Un producti tiene muchas imagenes
        return $this->hasMany(ProductImage::class);
    }
 

}
