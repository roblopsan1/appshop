<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends  Controller
{
    // Creamos métodos.

    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado
    }
    public function create(){
        return view('admin.products.create'); //formulario
     }
    public function store(Request $request ){

        //Validar
        $messages = [
            'name.required' =>"El nombre es requerido",
            'name.min' =>"El nombre debe tener almenos tres caracteres",
            'description.required' =>"La descripción es requerida",
            'description.max' =>"El número máximo de caracteres es 200",
            'price.required' =>"El precio es requerido",
            'price.numeric' =>"El precio debe ser un número",
            'price.min' =>"El precio deber ser mayor a cero"
        ];
        $rules =[
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request,$rules, $messages);
          //registrar nuevo producto en la BD
        //   dd($request->all());
        $product = new Product ();
        $product->name = $request -> input('name');
        $product->description = $request -> input('description');
        $product->price = $request -> input('price');
        $product->long_description = $request -> input('long_description');
        $product-> save(); // INSERT En la tabla de productos

        return redirect('/admin/products');
    }
    public function edit($id){

        // return "Mostar aqui el $id";
        $product = Product::find($id);
        return view('admin.products.edit') -> with(compact('product')); //formulario
     }
    public function update(Request $request, $id ){
        $messages = [
            'name.required' =>"El nombre es requerido",
            'name.min' =>"El nombre debe tener almenos tres caracteres",
            'description.required' =>"La descripción es requerida",
            'description.max' =>"El número máximo de caracteres es 200",
            'price.required' =>"El precio es requerido",
            'price.numeric' =>"El precio debe ser un número",
            'price.min' =>"El precio deber ser mayor a cero"
        ];
        $rules =[
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request,$rules, $messages);
          //registrar nuevo producto en la BD
        //   dd($request->all());
        $product = Product :: find($id);
        $product->name = $request -> input('name');
        $product->description = $request -> input('description');
        $product->price = $request -> input('price');
        $product->long_description = $request -> input('long_description');
        $product-> save(); // UPDATE En la tabla de productos

        return redirect('/admin/products');
    }
    public function destroy($id ){
      
       ProductImage ::where('product_id',$id)->delete(); 
      $product = Product :: find($id);
      $product-> delete(); // DELETE

      return back();
  }

}
