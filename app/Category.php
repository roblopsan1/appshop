<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$category->products
    //Se crea un metodo llamado productos
    public function products(){
        //Una categoria pertenece a muchas imagenes
        return $this->hasMany(Product::class);
    }
}
