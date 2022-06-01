<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product -> category 
    //Creamos un metodo llamado products
    public function category()
    {
        //Un producto pertenece a una categoria 
        return $this -> belongsTo( Category::class);
    }
    // $product -> images

    public function images()
    {
        //Un producto tiene muchas imagenes
        return $this->hasMany( ProductImage::class);
    }

}
