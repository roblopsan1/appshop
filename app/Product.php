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

    public function getFeaturedImageUrlAttribute()
    {
      $featuredImage = $this-> images()->where ('featured', true)->first();
      if (!$featuredImage)  
        $featuredImage = $this->images()->first();
      if ($featuredImage)
         {
             return $featuredImage -> url; 
         }  
         return '/images/products/default.jpg';
    }

}
