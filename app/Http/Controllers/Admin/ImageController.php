<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use File;



class ImageController extends Controller
{
   public function index($id)
   {
    $product = Product::find($id);
    $images = $product->images()->orderBy ('featured','descendent')->get() ;
    return view('admin.products.images.index')-> with(compact('product','images'));
   }
   public function store( Request $request, $id)
   {
    //guardar imagen en archivo 
    $file = $request -> file('photo');
    $path = public_path() . '/images/products';
    $fileName = uniqid() . $file->getClientOriginalName();
    $move = $file->move($path, $fileName);
   
    
    if ($move){
        //Realizar registro en BD
        $productImage = new ProductImage();
        $productImage ->image = $fileName ;
    // $productImage ->featured = false;
        $productImage -> product_id = $id;
        $productImage -> save();
    }
    return back();
   
    }
   public function destroy(Request $request, $id)
   {
    //Eliminar el archivo 
    $productImage = ProductImage::find($request-> image_id);
    if(substr($productImage->image, 0, 4)=== "http"){
        $deleted = true;
    }else{
        $fullPath = public_path().'/images/products/'.$productImage->image;
        $deleted = File::delete($fullPath);
    }


    //Eliminar al registro de la img en la BD
    if($deleted){
        $productImage ->delete();
    }
    return back();
    }

    public function select($id, $image)
    {
        ProductImage :: where('product_id', $id)->update([
            'featured'=>false
        ]);

        $productImage = ProductImage::find($image);
        $productImage ->featured = true;
        $productImage ->save();

        return back();

    }

}
