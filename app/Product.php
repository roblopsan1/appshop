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
    
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage  = $this->images()->where('featured', true)->first();
        if(!$featuredImage)
        $featuredImage = $this->images()->first();
        
        if($featuredImage)
        {
            return $featuredImage->url;
        }
        return '/images/products/default.png';
    }


}
