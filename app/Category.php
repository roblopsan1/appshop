<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Category extends Model
{
    // $Category -> products
    public function products()
    {
        //Una categoria tiene nuchos productos
        return $this -> hasMany(Product::class);
    }
}
