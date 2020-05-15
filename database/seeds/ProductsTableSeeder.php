<?php

use Illuminate\Database\Seeder;
use App\Product;
Use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        //model Fatories
        //Creamos 5 categorias
        factory(Category::class,5)->create();
        //Creamos 100 Productos
        factory(Product::class,100)->create();
        //Creamos 200 imagenes
        factory(ProductImage::class,200)->create();*/


        $categories=factory(Category::class,4)->create();
        $categories->each(function($category)
        {
            $products=factory(Product::class,5)->make();
            $category->products()->saveMany($products);

            $products->each(function($product){
                $images= factory(ProductImage::class,3)->make();
                $product->images()->saveMany($images);
            });
        });

    }
}
