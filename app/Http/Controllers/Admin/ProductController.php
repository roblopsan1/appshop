<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //lista de producots
    }
    public function create()
    {
        return view('admin.products.create'); //formulario de registro
    }
    public function store(Request $request)
    {
        $messages =[
            'name.required'=>'Es necesario ingresar un nombre de producto',
            'name.min'=>'El nombre del producto debe tener almenos tres caracteres',
            'description.required'=>'La descripción del producto es requerida',
            'description.max'=>'La descripción del producto es de máximo 200 caracteres',
            'price.required'=>'El precio del producto es requerido',
            'price.min'=>'El precio del producto no puede ser negativo'

        ];
        $rules =[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0'

        ];
        $this->validate($request, $rules, $messages);
        
      // registra el nuevo producto en BD
      // dd($request->all());Muestra los datos que se envian a la BD en formato json
      $product = new Product();
      $product->name=$request->input('name');
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->long_description=$request->input('long_description');
      $product->save(); // Inserta los valores
      return redirect('/admin/products'); //redirige a la pagina solicitada
    }
   
    //Edita y guarda los valores en la BD

    public function edit($id)
    { 
       // return "Mostrar aquí el  formulario para el producto con valor de id $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //formulario de registro
    }   
    public function update(Request $request, $id)
    {
        $messages =[
            'name.required'=>'Es necesario ingresar un nombre de producto',
            'name.min'=>'El nombre del producto debe tener almenos tres caracteres',
            'description.required'=>'La descripción del producto es requerida',
            'description.max'=>'La descripción del producto es de máximo 200 caracteres',
            'price.required'=>'El precio del producto es requerido',
            'price.min'=>'El precio del producto no puede ser negativo'

        ];
        $rules =[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0'

        ];
        $this->validate($request, $rules, $messages);
      // registra el nuevo producto en BD
      // dd($request->all());Muestra los datos que se envian a la BD en formato json
      $product = Product::find($id);
      $product->name=$request->input('name');
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->long_description=$request->input('long_description');
      $product->save(); // Actualiza los valores
      return redirect('/admin/products'); //redirige a la pagina solicitada
    }

//Elimina el registro en la BD

    public function destroy($id)
    {
      $product = Product::find($id);
      $product->delete(); // Elimina los valores
      return back(); //redirige a la pagina anterior
    }

}
